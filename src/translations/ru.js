export const RUSSIAN_TRANSLATIONS = {
    common: {
        buttons: {
            back: 'Назад',
            delete: 'Удалить',
            analytics: 'Обзор',
            rescan: 'Повтор'
        },
        inputs: {
            search: "Поиск"
        },
        selects: {
            filter: 'Фильтр',
            sign: 'Знак'
        },
        labels: {
            mobile: 'Мобильная версия',
            desktop: 'ПК версия'
        }
    },
    auth: {
        login_form_headline: 'Вход',
        email: 'Email',
        password: 'Пароль',
        login_button_text: 'Вход',
        register_button_text: 'Регистрация',
        register_form_headline: 'Регистрация',
        name: 'Имя',
        repeat_password: 'Повторите пароль',
        errors: {
            empty: 'Вы не можете войти, не заполнив все поля',
            wrong_password: 'Вы ввели неверный пароль, или такого пользователя не существует'
        }
    },
    routes: {
        dashboard: 'Обзор',
        mywebsites: 'Мои сайты',
        users: 'Пользователи',
        settings: 'Настройки',
        Analytics: 'Аналитика',
        Fullsitescan: 'Полное сканирование сайта',
        FullscanAnalytics: 'Обзор результатов',
        examples: 'Настройки примеров'
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
        },
        website: {
            pulse: 'Пульс',
            week: 'Последняя неделя',
            month: 'Последние 30 дней',
            range: 'или выберите диапазон',
            fullscan_btn: 'Полное сканирование'
        }
    },
    forms: {
        startfullscanform: {
            'headline': 'Сканирование всего сайта'
        }
    },
    fullscan: {
        progress: 'Прогресс',
        avg_score: 'Средний результат',
        avg_page_size: 'Ср. размер страницы',
        problem_pages: 'Ошибки',
        failed_label: 'Неудачно',
        min_label: 'Мин:',
        max_label: 'Макс:',
        table_title: 'Результаты сканирования',
        empty_search: 'По вашему запросу ничего не найдено!',
        modal: {
            delete: {
                title: 'Внимание',
                message: 'Вы точно хотите удалить все сканирования?'
            },
            rescan: {
                title: 'Требуется подтверждение',
                message: 'Повторное сканирование может занять до 60 секунд'
            }
        }
    },
    fullscananalytics: {
        titles: {
            scores: 'Результат скорости',
            fcp: 'Первая отрисовка контента',
            tbt: 'Общее время блокировки',
            tti: 'Время загрузки для взаимодействия',
            si: 'Индекс скорости загрузки',
            cls: 'Совокупное смещение макета',
        },
        zone_titles: {
            green: 'Страниц в зеленой зоне',
            orange: 'Страниц в желтой зоне',
            red: 'Страниц в красной зоне',
            na: 'Страниц без данных'
        },
        graph: {
            Green: 'Зеленая зона',
            Orange: 'Желтая зона',
            Red: 'Красная зона',
            NA: 'Нет данных'
        }
    }

};
