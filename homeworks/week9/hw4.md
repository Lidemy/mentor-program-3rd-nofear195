## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
VARCHAR: 適用於字數較少的欄位，通常會限制字數，例如: 文章標題
TEXT: 適用於字數較多的欄位，例如: 文章主要內容

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？
Cookie: 可以讓瀏覽器儲存資料的地方，由 Server 設定，放在 response 帶回給瀏覽器，
瀏覽器偵測到 Cookie，便將其寫入， 之後若有相同的 request，則瀏覽器會自動帶上 Cookie
 供 Server 辨認



## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
 我覺得是設定 Cookie 本身，正如作業上加註的警語，缺少資安的實作，若 Cookie 包含敏感資訊，則有被竊取的風險
