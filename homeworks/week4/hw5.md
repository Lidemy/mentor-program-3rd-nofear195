## 請以自己的話解釋 API 是什麼
定義一個特定的資料交換的格式，方便讓雙方交換資料


## 請找出三個課程沒教的 HTTP status code 並簡單介紹
1. `201 Created`: Request 成功，並依照 request 內容建立新的資源
2. `501 Not Implemented`: Server 不支援 request 所需要的某些功能
3. `505 HTTP Version Not Supported`: Server不支援或拒絕 request 所使用的 HTTP 版本


## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。

說明  |Method   |path   |argument   | example
--|---|---|---|--
獲取所有餐廳  |GET      |/restaurants   | _limit  | /restaurants?_limt=10
獲取一間餐廳  |GET      |/restaurants/:id   | none  | /restaurants/10
刪除餐廳      |DELETE   |/restaurants/:id   | name: restaurant name   | /restaurants/10
新增餐廳      |POST     |/restaurants   | none  | /restaurants
更改餐廳      |PATCH    |/restaurants/:id   | name: restaurant name  |/restaurants/10
