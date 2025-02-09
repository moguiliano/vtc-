<template>
  <div id="app">
    <h1>Bienvenue sur ZenCar</h1>
    <router-view /> <!-- Permet d'afficher les pages selon la route -->
  </div>
</template>

<script>
export default {
  name: "App"
};
</script>

<style>
/* Styles globaux */
body {
  font-family: Arial, sans-serif;
  background: #f4f4f4;
  margin: 0;
}
</style>
