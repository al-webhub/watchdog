export const ENGLISH_TRANSLATIONS = {
    common: {
      buttons: {
          back: 'Back',
          delete: 'Delete',
          analytics: 'Analytics',
          rescan: 'Rescan'
      },
      inputs: {
          search: "Search"
      },
      selects: {
          filter: 'Filter',
          sign: 'Sign'
      },
      labels: {
          mobile: 'Mobile',
          desktop: 'Desktop'
      }
    },
    auth: {
        login_form_headline: 'Login',
        email: 'Email',
        password: 'Password',
        login_button_text: 'Login',
        register_button_text: 'Register',
        register_form_headline: 'Register',
        name: 'Name',
        repeat_password: 'Repeat password',
    },
    routes: {
        dashboard: 'Dashboard',
        mywebsites: 'My websites',
        users: 'Users',
        settings: 'Settings',
        Analytics: 'Analytics',
        Fullsitescan: 'Full site scan',
        FullscanAnalytics: 'Analytics'
    },
    pages: {
        dashboard: {
            charts: {
                scans_chart: {
                    title: 'Today Scanned ',
                    sub_1: 'Today Scanned: ',
                    sub_2: 'times'
                },
                indev_chart: {
                    title: 'This chart is under development ',
                }
            },
            panels: {
                active_websites_panel: {
                    title: 'Active Websites',
                    sub: 'Last 24 hours'
                },
                total_scans_panel: {
                    title: 'Total scans',
                    sub: 'Today:'
                },
                under_development_panel: {
                    'title': 'Under development',
                    'sub': 'Under development'
                }
            }
        },
        websites: {
            title: 'Monitored websites',
            add_btn_text: 'Add new',
            search_placeholder: 'Search',
            table: {
                id: 'ID',
                name: 'Name',
                url: 'Url',
                created_at: 'Created At',
                last_scan: 'Last scan',
                last_score: 'Last score',
                ttfb: 'TTFB',
                scans: 'Scans',
                status: 'Status',
                controls: 'Controls',
                details_btn: 'Details'
            }
        },
        website: {
            pulse: 'Pulse',
            week: 'This week',
            month: 'Last 30 days',
            range: 'or select range',
            fullscan_btn: 'Full site scan'
        }
    },
    fullscan: {
        progress: 'Progress',
        avg_score: 'Average Score',
        avg_page_size: 'Average page size',
        problem_pages: 'Page with problems',
        failed_label: 'Failed',
        min_label: 'Min:',
        max_label: 'Max:',
        table_title: 'Scan results',
        empty_search: ' No results',
        modal: {
            delete: {
                title: 'Warning',
                message: 'Are you sure want to delete fullscans?'
            },
            rescan: {
                title: 'Please confirm',
                message: 'Rescan can take up to 60 seconds'
            }
        }
    },
    fullscananalytics: {
        titles: {
            scores: 'Scores',
            fcp: 'First contentful paint',
            tbt: 'Total blocking time',
            tti: 'Time to interactive',
            si: 'Speed Index',
            cls: 'Cumulative Layout Shift',
        },
        zone_titles: {
            green: 'Green zone pages',
            orange: 'Orange zone pages',
            red: 'Red zone pages',
            na: 'No data pages'
        },
        graph: {
            Green: 'Green',
            Orange: 'Orange',
            Red: 'Red',
            NA: 'NA'
        }
    }
};
