from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
import time
import os

inputUsername = input("Nhap username: ")
inputPassword = input("Nhap password: ")
driver = webdriver.Edge()

driver.get("http://localhost/web_qldiemthi/diemthi/admin/loginhs.php")

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
    print("Đăng nhập thành công!")

btn_xemdiem = driver.find_element(By.CSS_SELECTOR, "#menu > ul > li:nth-child(1) > a").click()

choice_HK = driver.find_element(By.NAME, "hk")
select = Select(choice_HK)
select.select_by_visible_text("Học Kỳ 2")

submit_xem = driver.find_element(By.NAME, "ok").click()

error_xem = driver.find_element(By.XPATH, "//*[@id='errors']")
print(error_xem.text)
# driver.save_screenshot("Result_Capture/ResultLoginAD_Fail.png")
time.sleep(3)

driver.quit()
