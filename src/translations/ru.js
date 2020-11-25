export const RUSSIAN_TRANSLATIONS = {
    auth: {
        login_form_headline: 'Вход',
        email: 'Email',
        password: 'Пароль',
        login_button_text: 'Вход',
        register_button_text: 'Регистрация',
        register_form_headline: 'Регистрация',
        name: 'Имя',
        repeat_password: 'Повторите пароль',
    },
    routes: {
        dashboard: 'Обзор',
        mywebsites: 'Мои сайты',
        users: 'Пользователи',
        settings: 'Настройки',
        Analytics: 'Аналитика',
        Fullsitescan: 'Полное сканирование сайта'
    },
    pages: {
        dashboard: {
            charts: {
                scans_chart: {
                    title: 'Сегодня просканировано ',
                    sub_1: 'Сегодня просканировано: ',
                    sub_2: 'раз'
                },
                indev_chart: {
                    title: 'Этот график в разработке ',
                }
            },
            panels: {
                active_websites_panel: {
                    title: 'Активные сайты',
                    sub: 'За последние 24 часа'
                },
                total_scans_panel: {
                    title: 'Всего сканирований',
                    sub: 'Сегодня:'
                },
                under_development_panel: {
                    'title': 'В разработке',
                    'sub': 'В разработке'
                }
            }
        },
        websites: {
            title: 'Наблюдаемые сайты',
            add_btn_text: 'Добавить новый',
            search_placeholder: 'Поиск',
            table: {
                id: 'ID',
                name: 'Имя',
                url: 'Url',
                created_at: 'Добавлен',
                last_scan: 'Посл. скан',
                last_score: 'Посл. счет',
                ttfb: 'TTFB',
                scans: 'Всего',
                status: 'Статус',
                controls: 'Управление',
                details_btn: 'Подробнее'
            }
        }
    },
    forms: {
        startfullscanform: {
            'headline': 'Сканирование всего сайта'
        }
    }

};
