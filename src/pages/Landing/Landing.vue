<template>
  <div class="wrapper">
    <vue-scroll-progress-bar backgroundColor="red" height=".25rem" />

    <div class="md-layout header-nav">
      <md-menu>
        <md-bottom-bar md-type="fixed" class="menu-components-wrapper">
          <md-bottom-bar-item class="menu-components-item" to="#top"
            >Home</md-bottom-bar-item
          >
          <md-bottom-bar-item class="menu-components-item" to="#about"
            >About</md-bottom-bar-item
          >
          <md-bottom-bar-item class="menu-components-item" to="#examples"
            >Examples</md-bottom-bar-item
          >
          <md-bottom-bar-item class="menu-components-item" to="#features"
            >Features</md-bottom-bar-item
          >
          <md-bottom-bar-item v-if="visible" class="menu-components-item" to="#insights"
            >Insights</md-bottom-bar-item
          >
          <md-bottom-bar-item class="menu-components-item" to="#contacts"
            >Contacts</md-bottom-bar-item
          >
          <md-bottom-bar-item
            class="menu-components-item menu-last-item"
            id="login-link"
            to="/login"
            >Login</md-bottom-bar-item
          >
        </md-bottom-bar>
      </md-menu>
    </div>
    <div class="md-layout section-normal  section" id="top">
      <div class="md-layout-item">
        <div class="top-container ">
          <div class="side">
            <h1 class="main-headline">
              Watchdog
            </h1>
            <h4 class="main-subheadline">Monitor and audit web performance.</h4>
            <h4 class="main-subheadline">
              Make meaningful improvements where it matters.
            </h4>
            <md-button class="btn-outline-white" to="#about">
              Discover
            </md-button>
          </div>
        </div>
        <img class="main-banner" src="@/assets/img/laptop.png" alt="" />
      </div>
    </div>
    <div class="md-layout first-section  section" id="about">
      <div class="md-layout-item ">
        <div class="md-layout-item centered-headline-margin " >
          <span class="md-display-2  white-text-custom">HOW IT WORKS</span>
          <br>
          <span class="md-subheading white-text-custom">Quick setup with nothing to download or install</span>
        </div>
        <div class="md-layout about-container">
          <div id="first" class="md-layout-item">
            <md-card class="btn-outline-white">
              <md-card-media class="text-center">
                <md-icon class="md-size-5x white-text-custom">link</md-icon>
              </md-card-media>
              <md-card-content class="white-text-custom text-center">
                <span class="md-headline">Add URL's in dashboard</span>
              </md-card-content>
            </md-card>
          </div>
          <div id="second" class="md-layout-item">
            <md-card class="btn-outline-white">
              <md-card-media class="text-center">
                <md-icon class="md-size-5x white-text-custom">speed</md-icon>
              </md-card-media>
              <md-card-content class="white-text-custom text-center">
                <span class="md-headline">Trigger Scans</span>
              </md-card-content>
            </md-card>
          </div>
          <div id="third" class="md-layout-item ">
            <md-card class="btn-outline-white">
              <md-card-media class="text-center">
                <md-icon class="md-size-5x white-text-custom"
                  >analytics</md-icon
                >
              </md-card-media>
              <md-card-content class="white-text-custom text-center">
                <span class="md-headline">Analyse Results</span>
              </md-card-content>
            </md-card>
          </div>
        </div>
      </div>
    </div>
    <div class="md-layout section" id="examples">
      <div class="md-layout-item section-normal">
        <div class="md-layout-item centered-headline-margin " >
          <span class="md-display-2  white-text-custom">Examples</span>
          <br>
          <span class="md-subheading white-text-custom">Below are some popular websites measured our Google PageSpeed Insights Monitoring service</span>
        </div>
        <div class="md-layout">
          <div class="md-layout-item">
            <table class="table table-bordered table-centered white-text-custom" >
              <thead class="table-head">
              <tr>
                <th colspan="9" class=" text-center">Mobile <i class="fa fa-mobile" aria-hidden="true"></i></th>
                <th colspan="8" class=" text-center">Desktop <i class="fa fa-desktop " aria-hidden="true"></i></th>
              </tr>
              <tr>
                <th class="">URL</th>
                <th class="text-center">Score </th>
                <th class=""><span class="small">FCP</span></th>
                <th class=""><span class="small">SI</span></th>
                <th class=""><span class="small">TTI</span> </th>
                <th class=""><span class="small">TBT</span></th>
                <th class=""><span class="small">CLS</span></th>
                <th class=""><span class="small">TTFB</span></th>
                <th class=""><span class="small">TBW</span></th>
                <th class="text-center">Score </th>
                <th class=""><span class="small">FCP</span></th>
                <th class=""><span class="small">SI</span></th>
                <th class=""><span class="small">TTI</span> </th>
                <th class=""><span class="small">TBT</span></th>
                <th class=""><span class="small">CLS</span></th>
                <th class=""><span class="small">TTFB</span></th>
                <th class=""><span class="small">TBW</span></th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center red">99.9</td>
                <td class="text-center orange">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center ">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center ">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center ">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center ">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center ">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center ">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center ">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center ">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              <tr>
                <td>https://twitter.com</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">north</md-icon><span class="green">99</span></td>
                <td class="text-center ">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
                <td class="text-center"><strong class="green">100</strong><md-icon  class="green">south</md-icon><span class="green">99</span></td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">99.9</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99</td>
                <td class="text-center">9.99 Mb</td>
              </tr>
              </tbody>
            </table>
            <div class="table-footer-text">
              <ul class="flat-list white-text-custom"  >
                <li>FPC - First contentful paint</li>
                <li>SI - Speed index</li>
                <li>TTI - Time to interact</li>
                <li>TBT - Total blocking time</li>
              </ul>
              <ul class="flat-list white-text-custom ">
                <li>CLS - Content Layout Shift</li>
                <li>TTFB - Time to first byte</li>
                <li>TBW - Total byte weight</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="md-layout section" id="features">
      <div
        class="md-layout-item section-normal"
      >
        <div class="md-layout-item centered-headline-margin " >
          <span class="md-display-2  white-text-custom">Features</span>
          <br>
          <span class="md-subheading white-text-custom">Google PageSpeed Monitoring that sends alerts when scores fall on your important pages <br>
            watchdog-app.ml is the premier tool for anyone that is serious about Technical SEO.
          </span>
        </div>
        <div class="md-layout-item table-footer-text white-text-custom" >
          <ul>
            <li>Monitored URLs - Your important URLs are checked every hour, day or week</li>
            <li>URL Level Analytics Lab and field data tracked over time</li>
            <li>Full Site Scans Test Google PageSpeed in bulk across every page of your website</li>
            <li>Automated Tests Set and forget. Hourly, daily and weekly options</li>
            <li>Downloadable Reports Generate reports to share with your clients (DEV)</li>
            <li>Notifications Immediate alerts when a URL is slow (DEV)</li>
            <li>Google Sheets Integration Data exported for analysis in your favorite tools (DEV)</li>
            <li>Powered By Lighthouse Lab and Field data from version 6 of the Pagespeed Insights API </li>
            <li>Manage Settings Set how often you want scans and what URLs they should include. (DEV)</li>
          </ul>
        </div>
      </div>
    </div>
    <div v-if="visible" class="md-layout section" id="insights">
      <div class="md-layout-item section-normal">
        Insights
      </div>
    </div>
    <div class="md-layout section" id="contacts">
      <div class="md-layout-item  section-normal">
        <div class="md-layout-item  md-lay md-medium-size-100 md-size-33  " style="float: right;">
          <form @submit.prevent="submit" class="transparent">
            <md-card>
              <h2 class="not_transparent text-center " style="color: white">
                Any question?
              </h2>

              <md-card-content class="not_transparent">
                <div class="md-layout">
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <md-field>
                      <label>Email</label>
                      <md-input
                              v-model="form.email"
                              type="email"
                              class="caret_color_red"
                      ></md-input>
                    </md-field>
                  </div>
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <md-field>
                      <label>Name</label>
                      <md-input
                              class="caret_color_red"
                              v-model="form.name"
                              type="text"
                      ></md-input>
                    </md-field>
                  </div>
                  <div class="md-layout-item md-small-size-100 md-size-100">
                    <md-field>
                      <label>Message</label>
                      <md-textarea class="caret_color_red" v-model="form.message"></md-textarea>
                    </md-field>
                  </div>
                  <div class="md-layout-item md-size-100 ">
                    <md-button
                            type="submit"
                            style="background-color: transparent !important;border: 1px solid white;"
                            class="md-raised btn-transparent"
                    >Send</md-button
                    >
                  </div>
                </div>
              </md-card-content>
            </md-card>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      visible: false,
      form: {
        email: "",
        name: "",
        message: ""
      },
      particles: {
        autoPlay: true,
        background: {
          color: {
            value: "#000000"
          },
          image: "",
          position: "50% 50%",
          repeat: "no-repeat",
          size: "cover",
          opacity: 1
        },
        backgroundMask: {
          composite: "source-in",
          cover: {
            color: {
              value: "#fff"
            },
            opacity: 1
          },
          enable: false
        },
        backgroundMode: {
          enable: true,
          zIndex: 0
        },
        detectRetina: true,
        fpsLimit: 60,
        infection: {
          cure: false,
          delay: 0,
          enable: false,
          infections: 0,
          stages: []
        },
        interactivity: {
          detectsOn: "canvas",
          events: {
            onDiv: {
              enable: true,
              ids: ["first", "second", "third"],
              mode: "bubble",
              type: "rectangle"
            },
            resize: true
          },
          modes: {
            bubble: {
              distance: 400,
              duration: 2,
              opacity: 0.8,
              size: 6,
              speed: 3,
              divs: [
                {
                  ids: "first",
                  color: "#ff0000"
                },
                {
                  ids: "second",
                  color: "#ff0014"
                },
                {
                  ids: "third",
                  color: "#ff0900"
                }
              ]
            }
          }
        },
        manualParticles: [],
        motion: {
          disable: false,
          reduce: {
            factor: 40,
            value: true
          }
        },
        particles: {
          bounce: {
            horizontal: {
              random: {
                enable: false,
                minimumValue: 0.1
              },
              value: 1
            },
            vertical: {
              random: {
                enable: false,
                minimumValue: 0.1
              },
              value: 1
            }
          },
          collisions: {
            bounce: {
              horizontal: {
                random: {
                  enable: false,
                  minimumValue: 0.1
                },
                value: 1
              },
              vertical: {
                random: {
                  enable: false,
                  minimumValue: 0.1
                },
                value: 1
              }
            },
            enable: false,
            mode: "bounce"
          },
          color: {
            value: "#ff0000",
            animation: {
              enable: true,
              speed: 1,
              sync: true
            }
          },
          life: {
            count: 0,
            delay: {
              random: {
                enable: true,
                minimumValue: 0
              },
              value: 0,
              sync: false
            },
            duration: {
              random: {
                enable: false,
                minimumValue: 0.0001
              },
              value: 0,
              sync: false
            }
          },
          links: {
            blink: false,
            color: {
              value: "#ffffff"
            },
            consent: false,
            distance: 100,
            enable: true,
            frequency: 1,
            opacity: 0.4,
            shadow: {
              blur: 5,
              color: {
                value: "#ff0001"
              },
              enable: false
            },
            triangles: {
              enable: false,
              frequency: 1
            },
            width: 1,
            warp: false
          },
          move: {
            angle: {
              offset: 45,
              value: 90
            },
            attract: {
              enable: false,
              rotate: {
                x: 600,
                y: 1200
              }
            },
            direction: "none",
            distance: 0,
            enable: true,
            gravity: {
              acceleration: 9.81,
              enable: false,
              maxSpeed: 15
            },
            noise: {
              delay: {
                random: {
                  enable: false,
                  minimumValue: 0
                },
                value: 0
              },
              enable: false
            },
            outModes: {
              default: "out",
              bottom: "bounce",
              left: "bounce",
              right: "bounce",
              top: "bounce"
            },
            random: false,
            size: false,
            speed: 6,
            straight: false,
            trail: {
              enable: false,
              length: 10000,
              fillColor: {
                value: "#0000000"
              }
            },
            vibrate: false,
            warp: false
          },
          number: {
            density: {
              enable: true,
              area: 800,
              factor: 1000
            },
            limit: 200,
            value: 200
          },
          opacity: {
            random: {
              enable: false,
              minimumValue: 0.1
            },
            value: 0.5,
            animation: {
              enable: false,
              minimumValue: 0.1,
              speed: 3,
              sync: false
            }
          },
          reduceDuplicates: false,
          rotate: {
            random: {
              enable: false,
              minimumValue: 0
            },
            value: 0,
            animation: {
              enable: false,
              speed: 0,
              sync: false
            },
            direction: "clockwise",
            path: true
          },
          shadow: {
            blur: 0,
            color: {
              value: "#000000"
            },
            enable: false,
            offset: {
              x: 0,
              y: 0
            }
          },
          shape: {
            options: {
              polygon: {
                sides: 5
              },
              image: {
                src: "https://cdn.matteobruni.it/images/particles/github.svg",
                width: 100,
                height: 100
              }
            },
            type: "circle"
          },
          size: {
            random: {
              enable: true,
              minimumValue: 1
            },
            value: 3,
            animation: {
              destroy: "none",
              enable: false,
              minimumValue: 0.1,
              speed: 20,
              startValue: "max",
              sync: false
            }
          },
          stroke: {
            width: 1,
            color: {
              value: "",
              animation: {
                enable: false,
                speed: 0,
                sync: false
              }
            }
          },
          twinkle: {
            lines: {
              enable: false,
              frequency: 0.05,
              opacity: 1
            },
            particles: {
              enable: false,
              frequency: 0.05,
              opacity: 1
            }
          }
        },
        pauseOnBlur: true,
        themes: []
      }
    };
  },
  components: {},
  methods: {
    show_subtitles: function() {
      this.subheaders_visible = true;
    },
    isInViewPort: function(element) {
      if (elem.length > 0) {
        let distance = elem.getBoundingClientRect();
        return (
          distance.top >= 0 &&
          distance.left >= 0 &&
          distance.bottom <=
            (window.innerHeight || document.documentElement.clientHeight) &&
          distance.right <=
            (window.innerWidth || document.documentElement.clientWidth)
        );
      }
      return false;
    }
  },
  mounted() {

  }
};
</script>

<style scoped>
/* Navigation */
.header-nav {
  position: fixed;
  left: 0;
  top: auto;
  bottom: 3px;
  z-index: 100;
  height: 3rem;
  padding: 0;
  border: 1px solid white;
}

.menu-components-wrapper {
  height: 3rem;
  width: 100vw;
}

.md-bottom-bar .md-bottom-bar-item {
  height: 3rem !important;
}

.menu-components-item {
  border: 1px solid white;
}

.md-theme-default {
  background-color: transparent !important;
}

.md-theme-default:hover {
  background-color: transparent !important;
}

.md-bottom-bar.md-type-fixed .md-bottom-bar-item {
  max-width: 100% !important;
}

.first-section {
  height: 100vh;
}

.section-normal {
  height: 100vh;
}

.section {
  background-color: #20272d;
}



/* Top container styles */
.top-container {
  position: absolute;
  top: 15%;
  left: 15%;
}

.main-headline {
  color: white;
}

.main-subheadline {
  color: white;
}

.main-banner {
  position: absolute;
  top: 10%;
  right: 10%;
  width: 50%;
  height: 70%;
}

.about-container2 {
  margin-top: 12vh;
  position: relative;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Examples section */
.table-centered {
  margin: 0 auto;
}

.flat-list {
  list-style-type: none;
  margin: 0;
  padding: 0;

  display: inline-block;
  *display: inline;
  zoom: 1
}

table, th, td {
  border: 1px solid white !important;
}

.table-footer-text {
  width: 55vw;
  margin: 1rem auto 0 auto;
}

/* Common styles */
.btn-outline-white {
  border: 1px solid white !important;
}

.white-text-custom {
  color: white !important;
}

.centered-headline-margin {
  text-align: center;
  margin-top: 1rem;
  margin-bottom: 1rem;
}

.red {
  color: red !important;
}

.orange {
  color: orange !important;
}

.green {
  color: lawngreen !important;
}

</style>
