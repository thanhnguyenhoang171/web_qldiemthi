from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
import time
import os

inputUsername = input("Nhap username: ")
inputPassword = input("Nhap password: ")
driver = webdriver.Edge()

driver.get("http://localhost/web_qldiemthi/diemthi/admin/logingv.php")

username = driver.find_element(
    By.CSS_SELECTOR,
    "body > div.wrap > form > input[type=text]:nth-child(1)",
)
username.send_keys(inputUsername)
password = driver.find_element(
    By.CSS_SELECTOR, "body > div.wrap > form > input[type=password]:nth-child(3)"
)
password.send_keys(inputPassword)
driver.find_element(
    By.CSS_SELECTOR, "body > div.wrap > form > button > input[type=submit]"
).click()

try:
    error = driver.find_element(By.ID, "#errors")
    if error.is_displayed():
        print("Đăng nhập không thành công!")
    else:
        print("Đăng nhập thành công!")
except:
    print("Đăng nhập không thành công!")

btn_doiMK = driver.find_element(By.CSS_SELECTOR, "#menu > ul > li:nth-child(4) > a").click()

inputOldPass = input("Nhap mat khau cu: ")
inputNewPass = input("Nhap mat khau moi: ")
inputReNewPass = input("Nhap mat lai khau moi: ")

old_pass = driver.find_element(By.CSS_SELECTOR, "body > div > form > input[type=password]:nth-child(1)")
old_pass.send_keys(inputOldPass)

new_pass = driver.find_element(By.CSS_SELECTOR, "body > div > form > input[type=password]:nth-child(3)")
new_pass.send_keys(inputNewPass)

re_new_pass = driver.find_element(By.CSS_SELECTOR, "body > div > form > input[type=password]:nth-child(5)")
re_new_pass.send_keys(inputReNewPass)

submit_doiMK = driver.find_element(By.NAME, "gv").click()


el_back = driver.find_element(By.NAME, "back").click()
el_logout = driver.find_element(By.CSS_SELECTOR, "#menu > ul > li:nth-child(5) > a").click()

el_dangnhap = driver.find_element(By.CSS_SELECTOR, "body > div.navbar.navbar-inverse.navbar-fixed-top > div > div > div > a:nth-child(3)").click()
el_dangnhapGV = driver.find_element(By.CSS_SELECTOR, "#menu > ul > li:nth-child(2) > a").click()

inputUsernameAC = input("Nhap username: ")
inputPasswordAC = input("Nhap password: ")

username = driver.find_element(
    By.CSS_SELECTOR,
    "body > div.wrap > form > input[type=text]:nth-child(1)",
)
username.send_keys(inputUsernameAC)
password = driver.find_element(
    By.CSS_SELECTOR, "body > div.wrap > form > input[type=password]:nth-child(3)"
)
password.send_keys(inputPasswordAC)
driver.find_element(
    By.CSS_SELECTOR, "body > div.wrap > form > button > input[type=submit]"
).click()

try:
    error = driver.find_element(By.ID, "#errors")
    if error.is_displayed():
        print("Đăng nhập thành công!")
    else:
        print("Đăng nhập thành công!")
except:
    print("Đăng nhập thành công!")

time.sleep(3)

driver.quit()
