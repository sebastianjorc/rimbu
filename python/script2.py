from json import dump
import random
from time import sleep
from selenium import webdriver

'''
while (exista_categoria)
    Buscar categoría
    Buscar subcategoría

'''

def guardar_lista(mi_lista):
    mi_path = 'C:/Users/shino/OneDrive/Escritorio/productos_rimbu3.csv'
    f = open(mi_path,'a+')
    i=0
    for producto in mi_lista:
        f.write(str(producto))
        f.write(';')
        i=i+1
        if(i%8 == 0):
            f.write('\n')
    f.close

def buscar_productos(driver,subcat_href):
    driver.get(subcat_href)
    elementos = get_elements(driver,0)
    existe_sgte = True
    pagina = 0
    while(existe_sgte): # Paginación
        try:
            for elemento in elementos:  
                try:
                    nombre = elemento.find_element_by_xpath('.//span[@class="black-icon"]').text
                    precio = elemento.find_element_by_xpath('.//div[@class="prices"]//span[@class="warn-text fw-500 price"]').text
                    imagen = elemento.find_element_by_xpath('.//img[@class="mw-100 h-100 ng-star-inserted"]').get_attribute("src")
                    l_elemento.append(str(i+1))           # Ingreso id de categoria
                    l_elemento.append(categorias[i])    # Ingreso el titulo de la categoría
                    l_elemento.append(str(j+1))           # Ingreso el id de subcategoria
                    l_elemento.append(s_categorias[j])  # Ingreso el titulo de la subcategoria
                    l_elemento.append(str(k+1))           # Ingreso el id del articulo
                    l_elemento.append(nombre)           # Datos del articulo
                    l_elemento.append(precio)
                    l_elemento.append(imagen)
                    k=k+1
                except:
                    print('\nError al leer siguiente articulo\n')
                    break

            pagina = pagina+1
            driver.get(s_direccion+';q=;page='+str(pagina)+';sort=')
            elementos = get_elements(driver,0)
            
        except:
            print('\n\nError en encontrar siguiente pagina\n\n')
            existe_sgte = False
            break

def get_productos(subcat_href, iteracion,subcat_nombre,i,j,k, elementos):
    sleep(random.uniform(3,6))
    try:
        container = subcat_href.find_element_by_xpath(
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

        productos = row.find_elements_by_xpath(
            ' div[@class="m-04 ng-star-inserted"]')

    except:
        if iteracion<3:
            iteracion = iteracion+1
            productos = get_productos(subcat_href,iteracion)

    return productos

def get_subcategorias(cat_href, iteracion,cat_nombre,i,j,k):
    sleep(random.uniform(4,7))
    try:        
        subcategorias = cat_href.find_elements_by_xpath('//div[@id="app"]//div[@class="theme-container main"]//app-plp-filter[@class="ng-star-inserted"]//div[@class="mat-expansion-panel-body"]//div[@class="categories-wrapper categories-dropdown mt-1 ng-star-inserted"]')
        for subcategoria in subcategorias:
            try:
                subcat_nombre = subcategoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').text
                subcat_href = subcategoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').get_attribute("href")
                productos,i,j,k = get_productos(subcat_href,0,subcat_nombre,i,j,k, productos)
            except:
                print ('Error al encontrar más subcategorias')
    except:
        if iteracion<3:
            iteracion=iteracion+1
            subcategoria = get_subcategorias(cat_href,iteracion)
    return productos,i,j,k

def buscar_subcategorias (driver,cat_nombre,i,j,k):
    cat_direacciones = []
    subcategorias = get_subcategorias(driver,0)
'''    
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
'''

def get_categorias(driver, iteracion):
    sleep(random.uniform(4,7))

    try:        
        categorias = driver.find_elements_by_xpath('//div[@id="app"]//div[@class="theme-container main"]//app-plp-filter[@class="ng-star-inserted"]//div[@class="mat-expansion-panel-body"]//div[@class="categories-wrapper categories-dropdown mt-1 ng-star-inserted"]')
        for categoria in categorias:
            try:
                cat_nombre = categoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').text
                cat_href = categoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').get_attribute("href")
                if (cat_nombre != 'Plumillas'):
                    #buscar subcategorias
                    i=i+1
                    productos,i,j,k = buscar_subcategorias(cat_href,0,cat_nombre,i,j,k)
            except:
                print ('Error al encontrar más categorias')

    except:
        if iteracion<3:
            iteracion=iteracion+1
            productos = get_categorias(driver,iteracion)

    return productos,i,j,k

def buscar_categorias (driver):
    cat_direacciones = []
    cat_nombres = []
    subcategorias,i,j,k = get_categorias(driver)

'''
    for subcategoria in subcategorias:
        try:
            cat_nombre = subcategoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').text
            cat_href = subcategoria.find_element_by_xpath('.//a[@class="primary-text deco-none ng-star-inserted"]').get_attribute("href")
            if (cat_nombre != 'Plumillas'):
                cat_nombres.append(cat_nombre)
                cat_direacciones.append(cat_href)
        except:
            print ('Error al encontrar más categorias')
    return (cat_nombres, cat_direacciones)
'''

def main():
    driver = webdriver.Chrome('./chromedriver.exe')
    driver.get('https://www.autoplanet.cl/categoria/repuestos/01')
    i,j,k,lista_productos = buscar_categorias(driver) # Obtengo categorias
    # i = Cantidad de categorias
    # j = Cantidad de Subcategorías
    # k = Cantidad de productos
    

    print('\n'+'\n'+'Categorias: '+str(i)+' Subcategorias: '+str(j)+' Articulos: '+str(k)+'\n'+'\n')
    guardar_lista(lista_productos)

if __name__ == "__main__":
    main()