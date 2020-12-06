<template>
  <div class="content" v-if="loaded">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <md-button
          v-on:click="
            $router.push({
              name: 'Fullsitescan',
              params: { website_id: website_id }
            })
          "
          class="md-sm md-danger pull-left"
        >
          <md-icon>keyboard_backspace</md-icon> {{ $t(`common.buttons.back`) }}
        </md-button>
      </div>
      <md-card v-if="loaded" class="md-card-plain md-accent">
        <md-card-header data-background-color="red">
          <div class="md-layout">
            {{ $t(`fullscananalytics.titles.scores`) }}
          </div>
        </md-card-header>
        <md-card-content class="card-customization">
          <div class="md-layout">
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">
                {{ $t(`common.labels.desktop`) }}
              </p>
              <fcp-chart
                :chartData="analytics.score_desktop.data"
                :chartLabels="analytics.score_desktop.labels"
                :chartColors="analytics.score_desktop.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">
                {{ $t(`common.labels.mobile`) }}
              </p>
              <fcp-chart
                :chartData="analytics.score_mobile.data"
                :chartLabels="analytics.score_mobile.labels"
                :chartColors="analytics.score_mobile.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
            >
              <md-toolbar class="md-success toolbar_margin ">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.green`) }}</span>
                  &nbsp; <md-icon>laptop_mac</md-icon
                  >{{ analytics.score_desktop.info.Green }}&nbsp;
                  <md-icon>phone_iphone</md-icon
                  >{{ analytics.score_mobile.info.Green }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 90,
                        filter: 'score_desktop',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 90,
                        filter: 'score_mobile',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-warning toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.orange`) }}</span>
                  &nbsp; <md-icon>laptop_mac</md-icon
                  >{{ analytics.score_desktop.info.Orange }}&nbsp;
                  <md-icon>phone_iphone</md-icon
                  >{{ analytics.score_mobile.info.Orange }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '50,89',
                        filter: 'score_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '50,89',
                        filter: 'score_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-danger toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.red`) }} </span>
                  &nbsp; <md-icon>laptop_mac</md-icon
                  >{{ analytics.score_desktop.info.Red }}&nbsp;
                  <md-icon>phone_iphone</md-icon
                  >{{ analytics.score_mobile.info.Red }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,49',
                        filter: 'score_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,49',
                        filter: 'score_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-default toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.na`) }} </span>
                  &nbsp; <md-icon class="text-black">laptop_mac</md-icon
                  >{{ analytics.score_desktop.info.NA }}&nbsp;
                  <md-icon class="text-black">phone_iphone</md-icon
                  >{{ analytics.score_mobile.info.NA }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 0,
                        filter: 'score_desktop',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 0,
                        filter: 'score_mobile',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar
                style="background-color: #fff8f6!important;"
                class=" toolbar_margin"
              >
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >laptop_mac</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.score_desktop.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.score_desktop.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.score_desktop.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.score_desktop.percent.NA }} %</span
                  >
                </h4>
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >phone_iphone</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.score_mobile.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.score_mobile.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.score_mobile.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.score_mobile.percent.NA }} %</span
                  >
                </h4>
              </md-toolbar>
            </div>
          </div>
        </md-card-content>
      </md-card>
      <md-card v-if="loaded" class="md-card-plain md-accent">
        <md-card-header data-background-color="red">
          <div class="md-layout">
            {{ $t(`fullscananalytics.titles.fcp`) }}
          </div>
        </md-card-header>
        <md-card-content class="card-customization">
          <div class="md-layout">
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">
                {{ $t(`common.labels.desktop`) }}
              </p>
              <fcp-chart
                :chartData="analytics.fcp_desktop.data"
                :chartLabels="analytics.fcp_desktop.labels"
                :chartColors="analytics.fcp_desktop.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">
                {{ $t(`common.labels.mobile`) }}
              </p>
              <fcp-chart
                :chartData="analytics.fcp_mobile.data"
                :chartLabels="analytics.fcp_mobile.labels"
                :chartColors="analytics.fcp_mobile.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
            >
              <md-toolbar class="md-success toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.green`) }}</span>
                  &nbsp; <md-icon>laptop_mac</md-icon
                  >{{ analytics.fcp_desktop.info.Green }}&nbsp;
                  <md-icon>phone_iphone</md-icon
                  >{{ analytics.fcp_mobile.info.Green }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,1999',
                        filter: 'fcp_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,1999',
                        filter: 'fcp_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-warning toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.orange`) }}</span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.fcp_desktop.info.Orange }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.fcp_mobile.info.Orange }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '2000,3999',
                        filter: 'fcp_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '2000,3999',
                        filter: 'fcp_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-danger toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.red`) }} </span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.fcp_desktop.info.Red }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.fcp_mobile.info.Red }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '4000',
                        filter: 'fcp_desktop',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '4000',
                        filter: 'fcp_mobile',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-default toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.na`) }} </span>
                  &nbsp;<md-icon class="text-black">laptop_mac</md-icon
                  >{{ analytics.fcp_desktop.info.NA }}&nbsp;<md-icon
                    class="text-black"
                    >phone_iphone</md-icon
                  >{{ analytics.fcp_mobile.info.NA }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0',
                        filter: 'fcp_desktop',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0',
                        filter: 'fcp_mobile',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar
                style="background-color: #fff8f6!important;"
                class=" toolbar_margin"
              >
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >laptop_mac</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.fcp_desktop.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.fcp_desktop.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.fcp_desktop.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.fcp_desktop.percent.NA }} %</span
                  >
                </h4>
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >phone_iphone</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.fcp_mobile.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.fcp_mobile.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.fcp_mobile.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.fcp_mobile.percent.NA }} %</span
                  >
                </h4>
              </md-toolbar>
            </div>
          </div>
        </md-card-content>
      </md-card>
      <md-card v-if="loaded" class="md-card-plain md-accent">
        <md-card-header data-background-color="red">
          <div class="md-layout">
            {{ $t(`fullscananalytics.titles.tbt`) }}
          </div>
        </md-card-header>
        <md-card-content class="card-customization">
          <div class="md-layout">
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">
                {{ $t(`common.labels.desktop`) }}
              </p>
              <fcp-chart
                :chartData="analytics.tbt_desktop.data"
                :chartLabels="analytics.tbt_desktop.labels"
                :chartColors="analytics.tbt_desktop.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">
                {{ $t(`common.labels.mobile`) }}
              </p>
              <fcp-chart
                :chartData="analytics.tbt_mobile.data"
                :chartLabels="analytics.tbt_mobile.labels"
                :chartColors="analytics.tbt_mobile.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
            >
              <md-toolbar class="md-success toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.green`) }}</span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.tbt_desktop.info.Green }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.tbt_mobile.info.Green }}&nbsp;
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,300',
                        filter: 'tbt_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,300',
                        filter: 'tbt_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-warning toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.orange`) }}</span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.tbt_desktop.info.Orange }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.tbt_mobile.info.Orange }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '301,599',
                        filter: 'tbt_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '301,599',
                        filter: 'tbt_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-danger toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.red`) }} </span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.tbt_desktop.info.Red }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.tbt_mobile.info.Red }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '600',
                        filter: 'tbt_desktop',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '600',
                        filter: 'tbt_mobile',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-default toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.na`) }} </span>
                  &nbsp;<md-icon class="text-black">laptop_mac</md-icon
                  >{{ analytics.tbt_desktop.info.NA }}&nbsp;<md-icon
                    class="text-black"
                    >phone_iphone</md-icon
                  >{{ analytics.tbt_mobile.info.NA }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 0,
                        filter: 'tbt_desktop',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 0,
                        filter: 'tbt_mobile',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar
                style="background-color: #fff8f6!important;"
                class=" toolbar_margin"
              >
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >laptop_mac</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tbt_desktop.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tbt_desktop.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tbt_desktop.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tbt_desktop.percent.NA }} %</span
                  >
                </h4>
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >phone_iphone</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tbt_mobile.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tbt_mobile.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tbt_mobile.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tbt_mobile.percent.NA }} %</span
                  >
                </h4>
              </md-toolbar>
            </div>
          </div>
        </md-card-content>
      </md-card>
      <md-card v-if="loaded" class="md-card-plain md-accent">
        <md-card-header data-background-color="red">
          <div class="md-layout">
            {{ $t(`fullscananalytics.titles.tti`) }}
          </div>
        </md-card-header>
        <md-card-content class="card-customization">
          <div class="md-layout">
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">
                {{ $t(`common.labels.desktop`) }}
              </p>
              <fcp-chart
                :chartData="analytics.tti_desktop.data"
                :chartLabels="analytics.tti_desktop.labels"
                :chartColors="analytics.tti_desktop.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">{{$t(`common.labels.mobile`)}}</p>
              <fcp-chart
                :chartData="analytics.tti_mobile.data"
                :chartLabels="analytics.tti_mobile.labels"
                :chartColors="analytics.tti_mobile.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
            >
              <md-toolbar class="md-success toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.green`) }}</span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.tti_desktop.info.Green }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.tti_mobile.info.Green }}&nbsp;
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,3899',
                        filter: 'tti_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,3899',
                        filter: 'tti_mobile',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-warning toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.orange`) }}</span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.tti_desktop.info.Orange }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.tti_mobile.info.Orange }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '3900,7299',
                        filter: 'tti_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '3900,7299',
                        filter: 'tti_mobile',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-danger toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.red`) }} </span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.tti_desktop.info.Red }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.tti_mobile.info.Red }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '7300',
                        filter: 'tti_desktop',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '7300',
                        filter: 'tti_mobile',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-default toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.na`) }} </span>
                  &nbsp;<md-icon class="text-black">laptop_mac</md-icon
                  >{{ analytics.tti_desktop.info.NA }}&nbsp;<md-icon
                    class="text-black"
                    >phone_iphone</md-icon
                  >{{ analytics.tti_mobile.info.NA }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 0,
                        filter: 'tti_desktop',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0',
                        filter: 'tti_mobile',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar
                style="background-color: #fff8f6!important;"
                class=" toolbar_margin"
              >
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >laptop_mac</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tti_desktop.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tti_desktop.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tti_desktop.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tti_desktop.percent.NA }} %</span
                  >
                </h4>
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >phone_iphone</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tti_mobile.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tti_mobile.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tti_mobile.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.tti_mobile.percent.NA }} %</span
                  >
                </h4>
              </md-toolbar>
            </div>
          </div>
        </md-card-content>
      </md-card>
      <md-card v-if="loaded" class="md-card-plain md-accent">
        <md-card-header data-background-color="red">
          <div class="md-layout">
            {{ $t(`fullscananalytics.titles.si`) }}
          </div>
        </md-card-header>
        <md-card-content class="card-customization">
          <div class="md-layout">
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">
                {{ $t(`common.labels.desktop`) }}
              </p>
              <fcp-chart
                :chartData="analytics.si_desktop.data"
                :chartLabels="analytics.si_desktop.labels"
                :chartColors="analytics.si_desktop.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">{{$t(`common.labels.mobile`)}}</p>
              <fcp-chart
                :chartData="analytics.si_mobile.data"
                :chartLabels="analytics.si_mobile.labels"
                :chartColors="analytics.si_mobile.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
            >
              <md-toolbar class="md-success toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.green`) }}</span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.si_desktop.info.Green }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.si_mobile.info.Green }}&nbsp;
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,3899',
                        filter: 'si_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '1,3899',
                        filter: 'si_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-warning toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.orange`) }}</span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.si_desktop.info.Orange }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.si_mobile.info.Orange }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '3900,7299',
                        filter: 'si_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '3900,7299',
                        filter: 'si_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-danger toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.red`) }} </span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.si_desktop.info.Red }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.si_mobile.info.Red }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 7300,
                        filter: 'si_desktop',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 7300,
                        filter: 'si_mobile',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-default toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.na`) }} </span>
                  &nbsp;<md-icon class="text-black">laptop_mac</md-icon
                  >{{ analytics.si_desktop.info.NA }}&nbsp;<md-icon
                    class="text-black"
                    >phone_iphone</md-icon
                  >{{ analytics.si_mobile.info.NA }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 0,
                        filter: 'si_desktop',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0',
                        filter: 'si_desktop',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar
                style="background-color: #fff8f6!important;"
                class=" toolbar_margin"
              >
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >laptop_mac</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.si_desktop.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.si_desktop.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.si_desktop.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.si_desktop.percent.NA }} %</span
                  >
                </h4>
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >phone_iphone</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.si_mobile.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.si_mobile.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.si_mobile.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.si_mobile.percent.NA }} %</span
                  >
                </h4>
              </md-toolbar>
            </div>
          </div>
        </md-card-content>
      </md-card>
      <md-card v-if="loaded" class="md-card-plain md-accent">
        <md-card-header data-background-color="red">
          <div class="md-layout">
            {{ $t(`fullscananalytics.titles.cls`) }}
          </div>
        </md-card-header>
        <md-card-content class="card-customization">
          <div class="md-layout">
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">
                {{ $t(`common.labels.desktop`) }}
              </p>
              <fcp-chart
                :chartData="analytics.cls_desktop.data"
                :chartLabels="analytics.cls_desktop.labels"
                :chartColors="analytics.cls_desktop.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-25"
            >
              <p class="text-center text-black">{{$t(`common.labels.mobile`)}}</p>
              <fcp-chart
                :chartData="analytics.cls_mobile.data"
                :chartLabels="analytics.cls_mobile.labels"
                :chartColors="analytics.cls_mobile.color"
              />
            </div>
            <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
            >
              <md-toolbar class="md-success toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.green`) }}</span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.cls_desktop.info.Green }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.cls_mobile.info.Green }}&nbsp;
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0.001,0.1',
                        filter: 'cls_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0.001,0.1',
                        filter: 'cls_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-warning toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.orange`) }}</span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.cls_desktop.info.Orange }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.cls_mobile.info.Orange }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0.101,0.25',
                        filter: 'cls_desktop',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0.101,0.25',
                        filter: 'cls_mobile',
                        params: 'range'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-danger toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.red`) }} </span>
                  &nbsp;<md-icon>laptop_mac</md-icon
                  >{{ analytics.cls_desktop.info.Red }}&nbsp;<md-icon
                    >phone_iphone</md-icon
                  >{{ analytics.cls_mobile.info.Red }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0.251',
                        filter: 'cls_desktop',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '0.251',
                        filter: 'cls_mobile',
                        params: '>'
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar class="md-default toolbar_margin">
                <h3 class="md-title">
                  <span class="card-right-margin">{{ $t(`fullscananalytics.zone_titles.na`) }} </span>
                  &nbsp;<md-icon class="text-black">laptop_mac</md-icon
                  >{{ analytics.cls_desktop.info.NA }}&nbsp;<md-icon
                    class="text-black"
                    >phone_iphone</md-icon
                  >{{ analytics.cls_mobile.info.NA }}
                </h3>
                <span class="space-filler" />
                <md-button
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: 0,
                        filter: 'cls_desktop',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>laptop_mac</md-icon>
                </md-button>
                <md-button
                  style="margin-left: 3px"
                  class="md-fab md-mini md-primary md-just-icon"
                  v-on:click="
                    $router.push({
                      name: 'Fullsitescan',
                      params: {
                        website_id: website_id,
                        search: '01',
                        filter: 'cls_mobile',
                        params: '='
                      }
                    })
                  "
                >
                  <md-icon>phone_iphone</md-icon>
                </md-button>
              </md-toolbar>
              <md-toolbar
                style="background-color: #fff8f6!important;"
                class=" toolbar_margin"
              >
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >laptop_mac</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.cls_desktop.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.cls_desktop.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.cls_desktop.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.cls_desktop.percent.NA }} %</span
                  >
                </h4>
                <h4 class="md-title">
                  <span class="card-right-margin "></span>
                  <md-icon class="text-black card-right-margin"
                    >phone_iphone</md-icon
                  >
                  <md-icon class="card-left-margin text-success"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.cls_mobile.percent.Green }} %</span
                  >
                  <md-icon class="card-left-margin text-warning"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.cls_mobile.percent.Orange }} %</span
                  >
                  <md-icon class="card-left-margin text-danger"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.cls_mobile.percent.Red }} %</span
                  >
                  <md-icon class="card-left-margin text-primary"
                    >brightness_1</md-icon
                  ><span class="text-black"
                    >{{ analytics.cls_mobile.percent.NA }} %</span
                  >
                </h4>
              </md-toolbar>
            </div>
          </div>
        </md-card-content>
      </md-card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";

import Vue from "vue";
import { FcpChart } from "@/components";
export default {
  components: {
    FcpChart
  },
  data() {
    return {
      loaded: false,
      analytics: null,
      website_id: 0
    };
  },
  methods: {
    ...mapActions({
      requestAnalytics: "fullscan/requestAnalytics"
    })
  },
  computed: {
    ...mapGetters({
      getAnalytics: "fullscan/getAnalytics"
    })
  },
  async mounted() {
    this.website_id = this.$route.params.website_id;
    await this.requestAnalytics(this.website_id);
    this.analytics = await this.getAnalytics;
    this.loaded = true;
  }
};
</script>

<style>
.card-customization {
  background-color: rgba(255, 255, 255, 0.7);
}
.text-black {
  color: black !important;
}
.toolbar_margin {
  margin-top: 10px;
}
.card-right-margin {
  margin-right: 10px !important;
}
.card-left-margin {
  margin-left: 10px !important;
}
.space-filler {
  flex: 1;
}
</style>
