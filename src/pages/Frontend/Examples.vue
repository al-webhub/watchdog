<template>
  <div class="md-layout section">
    <div class="md-layout-item section-normal">
      <div class="md-layout-item centered-headline-margin ">
        <span class="md-display-2  white-text-custom" v-on:click="test">Examples</span>
        <br />
        <span class="md-subheading white-text-custom"
          >Below are some popular websites measured our Google PageSpeed
          Insights Monitoring service</span
        >
      </div>
      <div class="md-layout">
        <div class="md-layout-item">
          <table v-if="loaded"
            class="table table-bordered table-centered white-text-custom"
          >
            <thead class="table-head">
              <tr>
                <th colspan="9" class=" text-center">
                  Mobile <i class="fa fa-mobile" aria-hidden="true"></i>
                </th>
                <th colspan="8" class=" text-center">
                  Desktop <i class="fa fa-desktop " aria-hidden="true"></i>
                </th>
              </tr>
              <tr>
                <th class="">URL</th>
                <th class="text-center">Score</th>
                <th class=""><span class="small">FCP</span></th>
                <th class=""><span class="small">SI</span></th>
                <th class=""><span class="small">TTI</span></th>
                <th class=""><span class="small">TBT</span></th>
                <th class=""><span class="small">CLS</span></th>
                <th class=""><span class="small">TTFB</span></th>
                <th class=""><span class="small">TBW</span></th>
                <th class="text-center">Score</th>
                <th class=""><span class="small">FCP</span></th>
                <th class=""><span class="small">SI</span></th>
                <th class=""><span class="small">TTI</span></th>
                <th class=""><span class="small">TBT</span></th>
                <th class=""><span class="small">CLS</span></th>
                <th class=""><span class="small">TTFB</span></th>
                <th class=""><span class="small">TBW</span></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="example in examples" :key="example.id">
                <td>{{ example.url }}</td>
                <td class="text-center">
                  <strong :style="{ color: getColor(example.score_mobile, 'score') }" >{{ example.score_mobile }}</strong>
                  <span :style="{ color: getColor(example.score_delta_mobile, 'score_delta') }" >&nbsp;<span v-if=" example.score_delta_mobile > 0">+</span>{{ example.score_delta_mobile }}</span>
                </td>
                <td :style="{ color: getColor(example.fcp_mobile, 'fcp') }" class="text-center">{{ example.fcp_mobile | normalize(1000) }}</td>
                <td :style="{ color: getColor(example.si_mobile, 'si') }" class="text-center ">{{ example.si_mobile | normalize(1000) }}</td>
                <td :style="{ color: getColor(example.tti_mobile, 'tti') }" class="text-center">{{ example.tti_mobile | normalize(1000) }}</td>
                <td :style="{ color: getColor(example.tbt_mobile, 'tbt') }"  class="text-center">{{ example.tbt_mobile | normalize(1000) }}</td>
                <td :style="{ color: getColor(example.cls_mobile, 'cls') }"  class="text-center">{{ example.cls_mobile | normalize(1000)}}</td>
                <td :style="{ color: getColor(example.ttfb_mobile, 'ttfb') }" class="text-center">{{ example.ttfb_mobile | normalize(1000) }}</td>
                <td class="text-center">{{ example.tbw_mobile | prettyBytes }}</td>
                <td class="text-center">
                  <strong :style="{ color: getColor(example.score_desktop, 'score') }" >{{ example.score_desktop }}</strong>
                  <span :style="{ color: getColor(example.score_delta_desktop, 'score_delta') }" >&nbsp;<span v-if=" example.score_delta_desktop > 0">+</span>{{ example.score_delta_desktop }}</span>
                </td>
                <td :style="{ color: getColor(example.fcp_desktop, 'fcp') }" class="text-center">{{ example.fcp_desktop | normalize(1000) }}</td>
                <td :style="{ color: getColor(example.si_desktop, 'si') }" class="text-center">{{ example.si_desktop  | normalize(1000) }}</td>
                <td :style="{ color: getColor(example.tti_desktop, 'tti') }" class="text-center">{{ example.tti_desktop | normalize(1000) }}</td>
                <td :style="{ color: getColor(example.tbt_desktop, 'tbt') }" class="text-center">{{ example.tbt_desktop | normalize(1000) }}</td>
                <td :style="{ color: getColor(example.cls_desktop, 'cls') }" class="text-center">{{ example.cls_desktop | normalize(1000)}}</td>
                <td :style="{ color: getColor(example.ttfb_desktop, 'ttfb') }" class="text-center">{{ example.ttfb_desktop| normalize(1000) }}</td>
                <td class="text-center">{{ example.tbw_desktop | prettyBytes }}</td>
              </tr>
            </tbody>
          </table>
          <div v-if="loaded" class="table-footer-text">
            <ul class="flat-list white-text-custom">
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
</template>

<script>
import { mapActions } from "vuex";
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      loaded: false,
      examples: {
        data: {
          score_desktop: null
        }
      }
    };
  },
  methods: {
    ...mapActions({
      requestPublicExamples: "examples/requestPublicExamples"
    }),
    test: function() {
      console.log( typeof this.examples[0])
    },
    getColor: function(value, type) {
      switch (type) {
        case "score":
          switch (true) {
            case value >= 90 && value <= 100:
              return "green";
            case value >= 50 && value <= 89:
              return "orange";
            case value >= 0 && value <= 49:
              return "red";
          }
          break;
        case "fcp":
          switch (true) {
            case value > 3999:
              return "red";
            case value >= 2000 && value <= 3999:
              return "orange";
            case value >= 0 && value <= 1999:
              return "green";
          }
          break;
        case "si":
          switch (true) {
            case value > 5800:
              return "red";
            case value >= 4400 && value <= 5799:
              return "orange";
            case value >= 0 && value <= 4399:
              return "green";
          }
          break;
        case "tti":
          switch (true) {
            case value > 7300:
              return "red";
            case value >= 3900 && value <= 7299:
              return "orange";
            case value >= 0 && value <= 3899:
              return "green";
          }
          break;
        case "tbt":
          switch (true) {
            case value > 600:
              return "red";
            case value >= 300 && value <= 599:
              return "orange";
            case value >= 0 && value <= 299:
              return "green";
          }
          break;
        case "cls":
          switch (true) {
            case value > 0.25:
              return "red";
            case value >= 0.1 && value <= 0.2499:
              return "orange";
            case value >= 0 && value <= 0.099:
              return "green";
          }
          break;
        case "ttfb":
          switch (true) {
            case value >= 0 && value <= 250:
              return "green";
            case value >= 251 && value <= 500:
              return "orange";
            case value >= 501:
              return "red";
          }
          break;
        case "score_delta":
          switch (true) {
            case value === 0:
              return "";
            case value > 0:
              return "green";
            case value < 0:
              return "red";
          }
          break;
      }
    }
  },
  computed: {
    ...mapGetters({
      getPublicExamples: "examples/getPublicExamples"
    })
  },
  filters: {
    normalize: function(value, modifier) {
      if (!value) {
        return 0;
      }

      if (!modifier) {
        return 0;
      }

      if (value > 1) {
        value = value / modifier;
      }

      return value.toFixed(2);
    }
  },
  async mounted() {
    await this.requestPublicExamples();
    this.examples = this.getPublicExamples;
    this.loaded = true;
  }
};
</script>

<style scoped>
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
  zoom: 1;
}

table,
th,
td {
  border: 1px solid white !important;
}

.table-footer-text {
  width: 55vw;
  margin: 1rem auto 0 auto;
}
</style>
