<template>
  <md-card class="md-card-nav-tabs" >
    <md-card-content>
      <slot name="content" :data-background-color="dataBackgroundColor"></slot>
    </md-card-content>
  </md-card>
</template>

<script>
export default {
  name: "nav-tabs-card",
  props: {
    dataBackgroundColor: {
      type: String,
      default: ""
    }
  }
};
</script>
