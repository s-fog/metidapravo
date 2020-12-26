const plugin = require('tailwindcss/plugin')

module.exports = {
    purge: {
        content: [
            './resources/**/*.blade.php',
            './resources/**/*.js',
            './config/app.php',
        ],
        options: {
            safelist: {
                deep: [/tns/, /fancybox/],
            }
        }
    },
    darkMode: false,
    theme: {
        fontFamily: {
            'primary': ['GothamPro', 'serif'],
            'nimbus': ['Nimbus', 'serif'],
            'oranien': ['Oranien', 'serif'],
        },
        screens: {
            'tablet': {'max': '1280px'},
            'mobile-550': {'max': '550px'},
            'mobile-500': {'max': '500px'},
            'mobile-450': {'max': '450px'},
            'mobile-400': {'max': '400px'},
            'mobile-350': {'max': '350px'},
        },
        colors: {
            primary: '#000',
            white: '#fff',
            red: '#f00',
            orange: {
                DEFAULT: '#eab78c',
                hover: '#e4ab7b',
            },
            hr: '#c6c7ca',
            grey: {
                hover: '#6e6e6e',
                DEFAULT: '#616161',
                light: '#7a7c83',
                dark: '#262626',
            },
            transparent: 'transparent'
        },
        spacing: {
            '0': '0px',
            '1': '1px',
            '2': '2px',
            '3': '3px',
            '4': '4px',
            '5': '5px',
            '6': '5px',
            '7': '6px',
            '8': '7px',
            '9': '8px',
            '10': '10px',
            '11': '11px',
            '12': '12px',
            '13': '13px',
            '14': '14px',
            '15': '15px',
            '16': '16px',
            '17': '17px',
            '18': '18px',
            '19': '19px',
            '20': '20px',
            '21': '21px',
            '22': '22px',
            '23': '23px',
            '24': '24px',
            '25': '25px',
            '26': '26px',
            '27': '27px',
            '28': '28px',
            '29': '29px',
            '30': '30px',
            '31': '31px',
            '32': '32px',
            '33': '33px',
            '34': '34px',
            '35': '35px',
            '36': '36px',
            '37': '37px',
            '38': '38px',
            '39': '39px',
            '40': '40px',
            '41': '41px',
            '42': '42px',
            '43': '43px',
            '44': '44px',
            '45': '45px',
            '46': '46px',
            '47': '47px',
            '48': '48px',
            '49': '49px',
            '50': '50px',
            '51': '51px',
            '52': '52px',
            '53': '53px',
            '54': '54px',
            '55': '55px',
            '56': '56px',
            '57': '57px',
            '58': '58px',
            '59': '59px',
            '60': '60px',
            '61': '61px',
            '62': '62px',
            '63': '63px',
            '64': '64px',
            '65': '65px',
            '66': '66px',
            '67': '67px',
            '68': '68px',
            '69': '69px',
            '70': '70px',
            '71': '71px',
            '72': '72px',
            '73': '73px',
            '74': '74px',
            '75': '75px',
            '76': '76px',
            '77': '77px',
            '78': '78px',
            '79': '79px',
            '80': '80px',
            '81': '81px',
            '82': '82px',
            '83': '83px',
            '84': '84px',
            '85': '85px',
            '86': '86px',
            '87': '87px',
            '88': '88px',
            '89': '89px',
            '90': '90px',
            '91': '91px',
            '92': '92px',
            '93': '93px',
            '94': '94px',
            '95': '95px',
            '96': '96px',
            '280': '280px',
            '222': '222px',
            '355': '355px',
        },
        fontSize: {
            '8': ['8px', '1.9'],
            '10': ['10px', '1.8'],
            '12': ['12px', '1.7'],
            '14': ['14px', '1.6'],
            '16': ['16px', '1.5'],
            '18': ['18px', '1.4'],
            '20': ['20px', '1.3'],
            '22': ['22px', '1.2'],
            '24': ['24px', {
                letterSpacing: '0.6px',
                lineHeight: '1.0',
            }],
            '26': ['26px', '1'],
            '28': ['28px', '1'],
            '30': ['30px', '1'],
            '32': ['32px', '1'],
            '34': ['34px', '1'],
            '36': ['36px', '1'],
            '38': ['38px', '1'],
            '40': ['40px', '1'],
            '42': ['42px', '1'],
            '44': ['44px', '1'],
            '46': ['46px', '1'],
            '48': ['48px', '1'],
        },
        letterSpacing: {
            '04': '0.4px',
            '1': '1px',
            '1.2': '1.2px',
        },
        fill: theme => ({
            current: 'currentColor',
            'orange': theme('colors.orange'),
            'white': theme('colors.white'),
        }),
        lineHeight: {
            '1': '1',
            '1.1': '1.1',
            '1.2': '1.2',
            '1.3': '1.3',
            '1.4': '1.4',
            '1.5': '1.5',
            '1.6': '1.6',
            '1.7': '1.7',
            '1.8': '1.8',
            '1.9': '1.9',
            '2': '2',
        },
        extend: {
            width: {
                '598px': '598px',
                '550px': '553px',
                '410px': '410px',
                '290px': '290px',
                '230px': '230px',
                '95%': '95%',
            },
            height: {
                '70px': '70px',
                '763px': '763px',
                '575px': '575px',
                '564px': '564px',
                '376px': '376px',
            },
            inset: {
                '525': '525px',
                '160': '160px',
            }
        }
    },
    variants: {
        extend: {
            rotate: ['group-hover', 'hover'],
            visibility: ['group-hover', 'hover'],
        }
    },
    plugins: [
        plugin(function({ addUtilities, addComponents, e, prefix, config  }) {
            const newComponents = {
                '.border-transparent': {
                    borderColor: 'transparent',
                },
                '.border-inherit': {
                    borderColor: 'inherit',
                },
                '.color-inherit': {
                    color: 'inherit',
                }
            }

            addComponents(newComponents, {
                variants: ['hover', 'group-hover'],
            })

            const newUtilities = {
                '.triangle-b': {
                    borderLeft: '3px solid transparent',
                    borderRight: '3px solid transparent',
                    borderTop: '5px solid #d0d0d0',
                },
                '.flex-full': {
                    flex: '0 0 100%',
                },
            }

            addUtilities(newUtilities)
        })
    ],
}
