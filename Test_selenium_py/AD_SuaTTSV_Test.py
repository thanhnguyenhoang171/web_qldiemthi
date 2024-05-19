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

el_sua = driver.find_element(By.XPATH, "/html/body/div/div[2]/table/tbody/tr[2]/td[11]/a/button").click()

el_maLH= driver.find_element(By.XPATH, "/html/body/table/tbody/tr[1]/td[2]/input")
in_maLH = input("Nhập mã lớp học: ")
el_maLH.clear()
el_maLH.send_keys(in_maLH)

el_tenSV= driver.find_element(By.XPATH, "/html/body/table/tbody/tr[2]/td[2]/input")
in_tenSV = input("Nhap ten sinh vien: ")
el_tenSV.clear()
el_tenSV.send_keys(in_tenSV)

el_gtNam = driver.find_element(By.CSS_SELECTOR, "body > table > tbody > tr:nth-child(3) > td:nth-child(2) > input[type=radio]:nth-child(1)").click()

el_ngaysinh= driver.find_element(By.XPATH, "/html/body/table/tbody/tr[4]/td[2]/input")
in_ngaysinh = input("Nhap ngay sinh: ")
el_ngaysinh.clear()
el_ngaysinh.send_keys(in_ngaysinh)

el_noisinh= driver.find_element(By.XPATH, "/html/body/table/tbody/tr[5]/td[2]/input")
in_noisinh = input("Nhap noi sinh: ")
el_noisinh.clear()
el_noisinh.send_keys(in_noisinh)

el_dantoc= driver.find_element(By.XPATH, "/html/body/table/tbody/tr[6]/td[2]/input")
in_dantoc = input("Nhap dan toc: ")
el_dantoc.clear()
el_dantoc.send_keys(in_dantoc)

el_tencha= driver.find_element(By.XPATH, "/html/body/table/tbody/tr[7]/td[2]/input")
in_tencha = input("Nhap ten cha: ")
el_tencha.clear()
el_tencha.send_keys(in_tencha)

el_tenme= driver.find_element(By.XPATH, "/html/body/table/tbody/tr[8]/td[2]/input")
in_tenme = input("Nhap ten me: ")
el_tenme.clear()
el_tenme.send_keys(in_tenme)

el_pass= driver.find_element(By.XPATH, "/html/body/table/tbody/tr[9]/td[2]/input")
in_pass = input("Nhap password: ")
el_pass.clear()
el_pass.send_keys(in_pass)

submit_sua = driver.find_element(By.CSS_SELECTOR, "body > table > tbody > tr:nth-child(10) > td > input").click()
driver.implicitly_wait(3)
driver.save_screenshot("Test_Selenium/pythonProject/.venv/Lib/site-packages/selenium/Result_Capture/SuaSinhVien.png")
time.sleep(3)
driver.quit()
