from json import dump
import random
import sys
from time import sleep
from selenium import webdriver

def main():
    url = 'https://soap.segurosfalabella.com/soap/mi-auto/patente/'
    driver = webdriver.Chrome('./chromedriver.exe')
    driver.get(url+sys.argv[1])
    sleep(random.uniform(3,6))
    html = driver.find_element_by_xpath('//body[@class="desktop"]'+
                                        '//section[@class="container mb-50"]'+
                                        '//div[@class="col-12 col-sm-8 col-md-7 col-lg-6 mx-auto"]'+
                                        '//div[@class="col-12"]'+
                                        '//form[@id="datosVehiculos"]'+
                                        '//article[@class="col-12 shadow br-15"]'+
                                        '//section[@class="col-12 pt-15 pb-15"]'#falla aquí..
                                        )
    elementos = html.find_elements_by_xpath('//div[@class="col-12 col-sm-6 mb-20"]')
    datos= []
    for elemento in elementos:
        p = elemento.find_element_by_xpath('p[@class="mb-0 line-height-normal text-light line-height-140 px-16 text-bold"]').text
        datos.append(p)
        print(p)

if __name__ == "__main__":
    main()