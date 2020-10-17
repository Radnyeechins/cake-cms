get artical API
GET :: http://localhost:8765/articles/article-list.json
GET  :: http://localhost:8765/articles/view/{slug-name}.json
POST:: http://localhost:8765/articles/article-add.json
    data :: {
	 "title" : "Posting",
 	 "body" : "API content",
 	 "user_id" : 1,
 	 "image" : ""
  }
