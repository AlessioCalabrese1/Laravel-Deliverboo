<template>
  <div>
    <HeaderComponent />
    <main>
      <router-view></router-view>
    </main>
    <FooterComponent />
  </div>
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';
export default {
  components:{
    HeaderComponent,
    FooterComponent
  }
}
</script>

<style scoped lang="scss">
@import "../../sass/variables";

main{
  padding: 105px 0;
  background-color: $backgroundColor;
}

</style>
