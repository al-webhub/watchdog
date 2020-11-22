<template>
  <div>
    <ul class="pagination pagination-success">
      <template v-for="page in data" >
        <li class="page-item" :class="{active: page === current}" :value="page" :key="page">
          <a v-on:click="$emit('changepage', page)" class="page-link">{{ page }}</a>
        </li>
      </template>
    </ul>
  </div>
</template>
<script>
export default {
  name: "pages",
  props: {
    title: String,
    icon: String,
    data: Array,
    current: Number
  },
  data() {
    return {
      visible: true
    };
  },
  computed: {
  }
};
</script>

<style>
  .pagination {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: .25rem
  }

  .pagination>.page-item>.page-link,.pagination>.page-item>span {
    border: 0;
    border-radius: 50%!important;
    -webkit-transition: all .3s;
    transition: all .3s;
    width: 30px!important;
    padding-bottom: 5px;
    padding-top: 5px;
    min-width: 30px!important;
    height: 30px!important;
    line-height: 30px;
    color: #999;
    font-weight: 400;
    font-size: 12px;
    text-transform: uppercase;
    background: transparent;
    text-align: center;
    cursor: pointer
  }

  .pagination>.page-item>.page-link:focus,.pagination>.page-item>.page-link:hover,.pagination>.page-item>span:focus,.pagination>.page-item>span:hover {
    color: #999!important
  }

  .pagination>.page-item.active>a,.pagination>.page-item.active>span {
    color: #999
  }

  .pagination>.page-item.active>a,.pagination>.page-item.active>a:focus,.pagination>.page-item.active>a:hover,.pagination>.page-item.active>span,.pagination>.page-item.active>span:focus,.pagination>.page-item.active>span:hover {
    background-color: #9c27b0;
    border-color: #9c27b0;
    color: #fff!important;
    -webkit-box-shadow: 0 4px 5px 0 rgba(156,39,176,.14),0 1px 10px 0 rgba(156,39,176,.12),0 2px 4px -1px rgba(156,39,176,.2);
    box-shadow: 0 4px 5px 0 rgba(156,39,176,.14),0 1px 10px 0 rgba(156,39,176,.12),0 2px 4px -1px rgba(156,39,176,.2)
  }

  .pagination.pagination-info>.page-item.active>a,.pagination.pagination-info>.page-item.active>a:focus,.pagination.pagination-info>.page-item.active>a:hover,.pagination.pagination-info>.page-item.active>span,.pagination.pagination-info>.page-item.active>span:focus,.pagination.pagination-info>.page-item.active>span:hover {
    background-color: #00bcd4;
    border-color: #00bcd4;
    -webkit-box-shadow: 0 4px 5px 0 rgba(0,188,212,.14),0 1px 10px 0 rgba(0,188,212,.12),0 2px 4px -1px rgba(0,188,212,.2);
    box-shadow: 0 4px 5px 0 rgba(0,188,212,.14),0 1px 10px 0 rgba(0,188,212,.12),0 2px 4px -1px rgba(0,188,212,.2)
  }

  .pagination.pagination-success>.page-item.active>a,.pagination.pagination-success>.page-item.active>a:focus,.pagination.pagination-success>.page-item.active>a:hover,.pagination.pagination-success>.page-item.active>span,.pagination.pagination-success>.page-item.active>span:focus,.pagination.pagination-success>.page-item.active>span:hover {
    background-color: #4caf50;
    border-color: #4caf50;
    -webkit-box-shadow: 0 4px 5px 0 rgba(76,175,80,.14),0 1px 10px 0 rgba(76,175,80,.12),0 2px 4px -1px rgba(76,175,80,.2);
    box-shadow: 0 4px 5px 0 rgba(76,175,80,.14),0 1px 10px 0 rgba(76,175,80,.12),0 2px 4px -1px rgba(76,175,80,.2)
  }


</style>
