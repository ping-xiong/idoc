## API规范

请仔细阅读本文，以便帮助你更好接入API。

## 鉴权

后台使用JWT作为鉴权方案。通过API接口登录后，会拿到服务器返回的Token数据，把该数据持久化本地储存，请求API时，需要将该字段放在请求头header中的Authorization字段。


格式为：Bearer空格Token


Bearer为固定字段，请勿修改


如：
```
Authorization: Bearer eyJhbGciOiJIUzI1NiI...
```


## 返回体说明

> 返回数据根据code判断是否成功，不可根据network status code判断，因为这个code始终为200


成功返回
```json
    {
        "code": 0,
        "message": "",
        "data": {

        }
    }
```


失败返回
```json
    {
        "code": -1,
        "message": "错误信息",
        "data": {

        }
    }
```

需要鉴权
```json
    {
        "code": 401,
        "message": "错误信息",
        "data": {

        }
    }
```

### API 返回code说明

错误码 | 意思
---------- | -------
0 | 请求成功，返回数据在data字段中
-1 | 请求失败，具体失败原因看message字段
401 | 请求失败，用户未登录或凭证过期，请指引用户重新登录


## 分页

> 分页返回

list字段为列表数据


total字段为数据总数

```json
	{
		"code": 0,
	    "message": "",
	    "data": {
	    	"list": [],
            "total": 0
        }
	}
```

具体分页请求方法见API接口。
