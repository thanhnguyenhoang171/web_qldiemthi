from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
import time
import os

inputUsername = input("Nhap username: ")
inputPassword = input("Nhap password: ")
driver = webdriver.Edge()

driver.get("http://localhost/web_qldiemthi/diemthi/admin/login.php")

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
time.sleep(3)  # Adjust sleep time as needed for your page load

# Kiểm tra xem phần tử lỗi có hiển thị hay không
try:
    error = driver.find_element(By.ID, "errors")
    if error.is_displayed():
        print("Đăng nhập không thành công!")
    else:
        print("Đăng nhập thành công!")
except:
    print("Đăng nhập thành công!")

driver.implicitly_wait(3)
el_qlsv = driver.find_element(By.CSS_SELECTOR, "#menu > ul > li:nth-child(1) > a").click()

choice_MaLH = driver.find_element(By.CSS_SELECTOR, "body > div > div.right > form > select")
selectLH = Select(choice_MaLH)
selectLH.select_by_visible_text("CS02C")

submit_xem = driver.find_element(By.CSS_SELECTOR, "body > div > div.right > form > input").click()

driver.save_screenshot("Result_Capture/GVXemSV.png")
time.sleep(3)
driver.quit()