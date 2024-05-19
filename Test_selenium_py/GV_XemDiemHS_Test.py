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

# Kiểm tra xem phần tử lỗi có hiển thị hay không
try:
    error = driver.find_element(By.ID, "errors")
    if error.is_displayed():
        print("Đăng nhập không thành công!")
    else:
        print("Đăng nhập thành công!")
except:
    print("Đăng nhập thành công!")

el_xemdiem = driver.find_element(By.XPATH, "//*[@id='menu']/ul/li[3]/a").click()

choice_LH = driver.find_element(By.NAME, "lop")
selectLH = Select(choice_LH)
selectLH.select_by_visible_text("CS02C")


choice_MH = driver.find_element(By.NAME, "mon")
selectMH = Select(choice_MH)
selectMH.select_by_visible_text("KTPM23")

choice_HK = driver.find_element(By.NAME, "hk")
selectHK = Select(choice_HK)
selectHK.select_by_visible_text("23HK2")

el_chon = driver.find_element(By.NAME, "add").click()

driver.save_screenshot("Result_Capture/DanhSachDiemSV.png")
time.sleep(3)

driver.quit()