from json import dump
import random
from time import sleep
from selenium import webdriver

def get_elements(driver, iteracion):
    sleep(random.uniform(3,6))
    try:
        container = driver.find_element_by_xpath(
            '//div[@id="app"]'+
            '//app-master[@class="ng-star-inserted"]'+
            '//div[@class="theme-container main"]')

        wrap = container.find_element_by_xpath(
            '//app-category[@class="ng-star-inserted"]'+
            '//mat-sidenav-content[@class="mat-drawer-content mat-sidenav-content"]'+
            '//div[@fxflex="76"]'+
            '/div[@fxlayout="row wrap"]')

        plp = wrap.find_element_by_xpath(
            ' app-plp-grid[@class="ng-star-inserted"]')

        row = plp.find_element_by_xpath(
            ' div[@class="ng-star-inserted"]')

        elementos = row.find_elements_by_xpath(
            ' div[@class="m-04 ng-star-inserted"]')
    except:
        if iteracion<2:
            iteracion = iteracion+1
            elementos = get_elements(driver,iteracion)
        else:
            return None

    return elementos

def guardar_lista(mi_lista):
    mi_path = 'C:/Users/shino/OneDrive/Escritorio/elementos_rimbu2.csv'
    f = open(mi_path,'a+')
    i=0
    for elemento in mi_lista:
        f.write(str(elemento))
        f.write(';')
        i=i+1
        if(i%8 == 0):
            f.write('\n')
    f.close

def get_subcategorias(driver, iteracion):
    sleep(random.uniform(4,7))
    try:        
        elementos = driver.find_elements_by_xpath('//div[@id="app"]//div[@class="theme-container main"]//app-plp-filter[@class="ng-star-inserted"]//div[@class="mat-expansion-panel-body"]//div[@class="categories-wrapper categories-dropdown mt-1 ng-star-inserted"]')
    except:
        if iteracion<3:
            iteracion=iteracion+1
            elementos = get_subcategorias(driver,iteracion)
    return elementos

def buscar_subcategorias (driver, cat_nombres):
    cat_direacciones = []
    subcategorias = get_subcategorias(driver,0)
    for subcategoria in subcategorias:
        try:
            cat_nombre = subcategoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').text
            cat_href = subcategoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').get_attribute("href")
            if (cat_nombres != []) and (cat_nombre in cat_nombres):
                continue
            else:
                cat_nombres.append(cat_nombre)
                cat_direacciones.append(cat_href)
        except:
            print ('Error al encontrar SUBCATEGORIAS')
    return (cat_nombres, cat_direacciones)

def buscar_categorias (driver):
    cat_direacciones = []
    cat_nombres = []
    subcategorias = get_subcategorias(driver,0)
    for subcategoria in subcategorias:
        try:
            cat_nombre = subcategoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').text
            cat_href = subcategoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').get_attribute("href")
            cat_nombres.append(cat_nombre)
            cat_direacciones.append(cat_href)
        except:
            print ('Error al encontrar más categorias')
    return (cat_nombres, cat_direacciones)

def main():
    driver = webdriver.Chrome('./chromedriver.exe')
    driver.get('https://www.autoplanet.cl/categoria/repuestos/01')
    categorias, direcciones = buscar_categorias(driver) # Obtengo categorias
    i=0
    j=0
    k=0
    s_categorias = []
    l_elemento = []
    for direccion in direcciones:   # Recorro categorías
        try:  
            driver.get(direccion)
            s_categorias,s_direcciones = buscar_subcategorias(driver,s_categorias)  #Obtengo subcategorías            
            i=i+1
            for s_direccion in s_direcciones:   #Recorro subcategorías
                driver.get(s_direccion)
                elementos = get_elements(driver,0)
                existe_sgte = True
                pagina = 0
                j=j+1
                while(existe_sgte): # Paginación
                    try:
                        for elemento in elementos:  
                            try:
                                nombre = elemento.find_element_by_xpath('.//span[@class="black-icon"]').text
                                precio = elemento.find_element_by_xpath('.//div[@class="prices"]//span[@class="warn-text fw-500 price"]').text
                                imagen = elemento.find_element_by_xpath('.//img[@class="mw-100 h-100 ng-star-inserted"]').get_attribute("src")
                                l_elemento.append(str(i))             # Ingreso id de categoria
                                l_elemento.append(str(categorias[i-1]))   # Ingreso el titulo de la categoría
                                l_elemento.append(str(j))             # Ingreso el id de subcategoria
                                l_elemento.append(str(s_categorias[j-1])) # Ingreso el titulo de la subcategoria
                                k=k+1
                                l_elemento.append(str(k))             # Ingreso el id del articulo
                                l_elemento.append(str(nombre))          # Datos del articulo
                                l_elemento.append(str(precio))
                                l_elemento.append(str(imagen))
                            except:
                                print('\nError al leer siguiente articulo\n')
                                break

                        pagina = pagina+1
                        driver.get(s_direccion+';q=;page='+str(pagina)+';sort=')
                        elementos = get_elements(driver,0)
                        if elementos == None:
                            existe_sgte = False
                        
                    except:
                        print('\n\nError en encontrar siguiente pagina\n\n')
                        existe_sgte = False
                        break
        except:
            print('Error al leer las subcategorias')    

    print('\n'+'\n'+'Categorias: '+str(i)+' Subcategorias: '+str(j)+' Articulos: '+str(k)+'\n'+'\n')
    guardar_lista(l_elemento)

if __name__ == "__main__":
    main()