# Watchdog




## Table of Contents

* [Versions](#versions)
* [Quick Start](#quick-start)
* [Documentation](#documentation)
* [File Structure](#file-structure)

## Versions
v.00

## Quick start

##  Build Setup

### install 
1. Run 
`npm install`
2. Go to API directory
`cd /api/`
3. Run
`composer install`
4. Create .env file
`cp .env.example .env`
5. Set up laravel app key
`php artisan key:generate`
6. Set up JWT secret token
`php artisan jwt:secret`
7. Run migrations
`php artisan migrate`
8. DEV Create admin user with tinker
`php artisan tinker`

`$user = new User();`

`$user->name = 'Username';`

`$user->email = 'email@email.com';`

`$user->password = Hash::make('password');`

`$user->save();`

`exit`


### serve with hot reload at localhost:8080
`npm run dev`
### build for production with minification
`npm run build`


## Documentation
Under development


## File Structure
Under development 

```
vue-material-dashboard
├── README.md
├── babel.config.js
├── package.json
├── postcss.config.js
├── public
│   └── index.html
└── src
    ├── App.vue
    ├── assets
    │   ├── img
    │   └── scss
    │       ├── material-dashboard.scss
    │       └── md
    ├── components
    │   ├── Cards
    │   │   ├── ChartCard.vue
    │   │   ├── NavTabsCard.vue
    │   │   └── StatsCard.vue
    │   ├── Dropdown.vue
    │   ├── NotificationPlugin
    │   │   ├── Notification.vue
    │   │   ├── Notifications.vue
    │   │   └── index.js
    │   ├── SidebarPlugin
    │   │   ├── SideBar.vue
    │   │   ├── SidebarLink.vue
    │   │   └── index.js
    │   ├── Tables
    │   │   ├── NavTabsTable.vue
    │   │   ├── OrderedTable.vue
    │   │   └── SimpleTable.vue
    │   └── index.js
    ├── globalComponents.js
    ├── globalDirectives.js
    ├── main.js
    ├── material-dashboard.js
    ├── pages
    │   ├── Dashboard.vue
    │   ├── Icons.vue
    │   ├── Layout
    │   │   ├── Content.vue
    │   │   ├── ContentFooter.vue
    │   │   ├── DashboardLayout.vue
    │   │   ├── MobileMenu.vue
    │   │   └── TopNavbar.vue
    │   ├── Maps.vue
    │   ├── Notifications.vue
    │   ├── TableList.vue
    │   ├── Typography.vue
    │   ├── UpgradeToPRO.vue
    │   ├── UserProfile
    │   │   ├── EditProfileForm.vue
    │   │   └── UserCard.vue
    │   ├── UserProfile.vue
    │   └── index.js
    └── routes
        └── routes.js
```


