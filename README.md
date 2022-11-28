```
composer i
php artisan key:generate
php artisan jwt:secret
php artisan migrate --seed
```

В сидере прописаны:

1) 4 пользователя (UserSeeder)
2) 3 Роля (RoleSeeder)
3) 16 Пермишына (PermissionSeeder)

Группа Админ может все
<br>
Группа Manager может добавлять роли, пермишыны, цеплять пользователей к ролям
<br>
Группа Blogger может добавлять, редактирвоать и удалять посты
<br>
4-й пользователь reader не добавлен нивкакие группы, по этому у него нет пермишына, он только может просматривать список постов
