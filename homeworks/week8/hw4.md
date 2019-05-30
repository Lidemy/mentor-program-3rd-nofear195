## 什麼是 Ajax？
一種使用非同步與 Server 交換資料的方法，能快速、即時更新介面與內容，且不需重新讀取整個頁面，使程式更快速回應使用者的操作
## 用 Ajax 與我們用表單送出資料的差別在哪？
表單:每當送出資料後，整個頁面都需要重新 render
Ajax:每當送出資料後，只需更新局部的頁面，不影響頁面其他部分

## JSONP 是什麼？
利用不受同源政策影響的元素透過指定好的 function 將資料帶回，完成與 Server 間的資料交換

## 要如何存取跨網域的 API？
利用 "CORS"，跨來源資源共享的方法，Server 必須在 Response Header 內加上 "Access-Control-Allow-Origin"，如此一來，當瀏覽器收到 Response 後，若原 Request 內的 Origin 有包含在 "Access-Control-Allow-Origin" 內，則允許程式接收 Response

## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？
瀏覽器基於安全性的考量而加入同源政策，使得不同源的網站，因為瀏覽器的阻擋，而收不到　Response，
而第四周則因為使用　nodejs 進行資料交換， nodejs 是直接與 Server 進行資料交換，過程中沒有透過瀏覽器，所以不受同源政策的約束，也就沒有跨網域的問題
