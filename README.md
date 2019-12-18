# easemob
环信及时通讯包开发，用于环信用户、群、聊天室等功能

此版本修改于zz98500的laravel版本
[http://github.com/zz98500/laravel-easemob](http://github.com/zz98500/laravel-easemob)

去除了laravel框架相关的配置、缓存等，配置参数在实例化时通过外部传入，asscee_token通过方法调用，在库包外根据条件进行缓存，使本类包单纯实现环信接口，适用更多使用环境
## 安装

`composer require guyanyouyou/easemob`

## 使用
- - -


### 实例化
```
use guyanyouyou\easemob;
$config = [
    'domain_name' => 'https://a1.easemob.com',  //可选参数
    'client_id' => 'your client_id',
    'client_secret' => 'your client_secret',
    'org_name' => 'your org_name',
    'app_name' => 'your app_name',
    'access_token'=> '外部缓存的access_token'   //可选参数，不填则每次请求新的access_token
];
$ease = new Easemob($config);
```




### 获取token
`$ease->getToken();`

- - -
### 开放注册用户
`$user = $ease->publicRegistration('xiaoming1');`

### 授权注册 同一个用户只能注册一次
`$user = $ease->authorizationRegistration('xiaoming1');`

### 批量注册
```php
$users = [
    ['username'=>'xiaoming2','password'=>1],
    ['username'=>'xiaoming3','password'=>1],
];
$user = $ease->authorizationRegistrations($users);
```

- - -
### 获取用户
`$user = $ease->getUser('xiaoming1');`

### 获取app所有的用户
```php
$user = $ease->getUserAll(100,'LTgzNDAxMjM3OTprcFJFRUpzdUVlYWh5V1UwQjNSbldR');
```

### 删除用户
`$user = $ease->delUser('xiaoming1');`

### 修改用户密码
`$user = $ease->editUserPassword('xiaoming2',111);`

### 修改昵称
`$user = $ease->editUserNickName('xiaoming2',11);`

### 强制用户下线
`$user = $ease->disconnect('xiaoming2');`

### 添加好友
`$user = $ease->addFriend('xiaoming2','xiaoming3');`

### 删除用户
`$user = $ease->delFriend('xiaoming2','xiaoming3');`

### 显示用户好友
`$user = $ease->showFriends('xiaoming2');`

- - -
### 上传文件
`$ease->uploadFile($file_path);`

### 下载文件
`$ease->downloadFile($uuid, $share_secret);`

- - -
### 发送文本消息
`$ease->sendMessageText($users, $target_type = 'users', $message = "", $send_user = 'admin', $ext = []);`

### 发送图片消息
`$ease->sendMessageImg($users, $target_type = 'users', $uuid, $share_secret, $file_name, $width = 480, $height = 720, $send_user = 'admin');`

### 发送语音消息
`$ease->sendMessageAudio($users, $target_type = 'users', $uuid, $share_secret, $file_name, $length = 10, $send_user = 'admin');`

### 发送视频消息
`$ease->sendMessageVideo($users, $target_type = 'users', $video_uuid, $video_share_secret, $video_file_name, $length = 10, $video_length = 58103, $img_uuid, $img_share_secret, $send_user = 'admin');`

### 消息透传
`$ease->sendMessagePNS($users, $target_type = 'users', $action = "", $send_user = 'admin');`

### 拉取历史消息
`$ease->getChatMessages($time = '20170801');`
- - -
### 获取群信息
`$ease->groups($group_ids);`

### 新建群
`$ease->groupCreate($group_name, $group_description = '描述', $owner_user, $members_users = [], $is_public = true, $max_user = 200, $is_approval = true)`

### 修改群信息
`$ease->groupEdit($group_id, $group_name = "", $group_description = "", $max_user = 0)`

### 删除群
`$ease->groupDel($group_id)`

### 获取所有群成员
`$ease->groupUsers($group_id)`

### 添加群成员
`$ease->groupAddUsers($group_id, $users)`

### 删除群成员
`$ease->groupDelUsers($group_id, $users)`

### 获取用户所以参加的群
`$ease->userToGroups($user)`

### 群转让
`$ease->groupTransfer($group_id, $new_owner_user)`

- - -
### 查看聊天室详情
`$ease->room($room_id)`

### 创建聊天室
`$ease->roomCreate($room_name, $owner_name, $room_description = "描述", $max_user = 200, $member_users = [])`

### 删除聊天室
`$ease->roomDel($room_id)`

### 修改聊天室信息
`$ease->roomEdit($room_id, $room_name = "", $room_description = "", $max_user = 0)`

### 获取用户参加的聊天室
`$ease->userToRooms($user)`

### 聊天室添加成员
`$ease->roomAddUsers($room_id, $users)`


### 聊天室删除成员
`$ease->roomDelUsers($room_id, $users)`

