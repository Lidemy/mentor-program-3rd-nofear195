## 請說明 SQL Injection 的攻擊原理以及防範方法
* 攻擊原理：利用 SQL 語法上的漏洞，在輸入的字串中挾帶特殊字元，改變語法上的邏輯，進而取得資料庫的內容
* 防範方法：使用 prepare statement，將輸入的字串當作參數處理而非 SQL 語法的一部分
* 參考資料:
  * https://zh.wikipedia.org/wiki/SQL%E6%B3%A8%E5%85%A5
  * https://www.qa-knowhow.com/?p=4172
  * https://www.w3schools.com/php/php_mysql_prepared_statements.asp
  * https://www.puritys.me/docs-blog/article-11-SQL-Injection-%E5%B8%B8%E8%A6%8B%E7%9A%84%E9%A7%AD%E5%AE%A2%E6%94%BB%E6%93%8A%E6%96%B9%E5%BC%8F.html
  * https://ihower.tw/rails/security.html
## 請說明 XSS 的攻擊原理以及防範方法
* 攻擊原理：利用網頁的安全性漏洞，通過特殊的方式在網頁放入惡意的程式，使其他使用者在觀看網頁受到惡意程式的影響，惡意程式以 JavaScript 為最大宗
* 防範方法：使用 escape，將原本帶有特殊語意的標籤或程式碼，視為純文字
* 參考資料:
  * https://zh.wikipedia.org/wiki/%E8%B7%A8%E7%B6%B2%E7%AB%99%E6%8C%87%E4%BB%A4%E7%A2%BC
  * https://www.puritys.me/docs-blog/article-78-XSS-%E6%94%BB%E6%93%8A.html
  * https://ihower.tw/rails/security.html
## 請說明 CSRF 的攻擊原理以及防範方法
* 攻擊原理：利用網頁的身分驗證漏洞，經過技術取得使用者身分驗證後的網頁權限，偽造使用者對網頁做出 request 的動作
* 防範方法：在 request 中增加隨機 token，供 Server 驗證是否為使用者本人 
* * 參考資料:
  * https://zh.wikipedia.org/wiki/%E8%B7%A8%E7%AB%99%E8%AF%B7%E6%B1%82%E4%BC%AA%E9%80%A0
  * https://www.puritys.me/docs-blog/article-226-%E5%85%AD%E7%A8%AE%E5%B8%B8%E8%A6%8B%E7%9A%84%E9%A7%AD%E5%AE%A2%E6%94%BB%E6%93%8A%E6%96%B9%E5%BC%8F.html
  * https://ihower.tw/rails/security.html
