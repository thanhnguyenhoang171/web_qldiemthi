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

el_capnhatdiem = driver.find_element(By.XPATH, "//*[@id='menu']/ul/li[2]/a").click()

choice_LH = driver.find_element(By.NAME, "day")
selectLH = Select(choice_LH)
selectLH.select_by_visible_text("CS02C")


choice_MH = driver.find_element(By.NAME, "mon")
selectMH = Select(choice_MH)
selectMH.select_by_visible_text("Kiểm Thử Phần Mềm")

choice_HK = driver.find_element(By.NAME, "hk")
selectHK = Select(choice_HK)
selectHK.select_by_visible_text("23HK2")

el_chon = driver.find_element(By.CSS_SELECTOR, "body > form:nth-child(5) > div > p > input").click()

diemMieng_elements = driver.find_elements(By.XPATH, "/html/body/table/tbody/tr[2]/td[6]/input")
diemMieng = input("Nhập điểm miệng cho sinh viên: ")
for element in diemMieng_elements:
    element.clear()
    element.send_keys(diemMieng)

diem15P_elements = driver.find_element(By.XPATH, "/html/body/table/tbody/tr[2]/td[7]/input")
diem15P = input("Nhập điểm 15 phút 1 cho sinh viên: ")
diem15P_elements.clear()
diem15P_elements.send_keys(diem15P)

diem15P2_elements = driver.find_element(By.XPATH, "/html/body/table/tbody/tr[2]/td[8]/input")
diem15P2 = input("Nhập điểm 15 phút 2 cho sinh viên: ")
diem15P2_elements.clear()
diem15P2_elements.send_keys(diem15P2)

diem1T_elements = driver.find_element(By.XPATH, "/html/body/table/tbody/tr[2]/td[9]/input")
diem1T = input("Nhập điểm 1 tiết 1 cho sinh viên: ")
diem1T_elements.clear()
diem1T_elements.send_keys(diem1T)

diem1T2_elements = driver.find_element(By.XPATH, "/html/body/table/tbody/tr[2]/td[10]/input")
diem1T2 = input("Nhập điểm 1 tiết 2 cho sinh viên: ")
diem1T2_elements.clear()
diem1T2_elements.send_keys(diem1T2)

diemThi_elements = driver.find_element(By.XPATH, "/html/body/table/tbody/tr[2]/td[11]/input")
diemThi = input("Nhập điểm thi cho sinh viên: ")
diemThi_elements.clear()
diemThi_elements.send_keys(diemThi)

submit_themdiem = driver.find_element(By.CSS_SELECTOR, "body > div:nth-child(7) > div:nth-child(2) > input").click()


driver.save_screenshot("testGV.png")
time.sleep(3)

driver.quit()