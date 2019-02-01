<template>
  <nav class="navbar">
    <RouterLink class="navbar__brand" to="/"></RouterLink>
    <div class="navbar__menu">
      <div class="navbar__item">
        <button class="button">
          <i class="icon ion-md-add"></i>
          Post a coeur
        </button>
      </div>
      <span class="navbar__item">username</span>
      <div class="navbar__item">
        <RouterLink class="button button--link" to="/login">Login / Register</RouterLink>
      </div>
    </div>
  </nav>
</template>
