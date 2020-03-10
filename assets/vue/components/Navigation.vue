<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-white bg-light">
      <router-link
        class="navbar-brand"
        to="/home"
      >
        <img
          src="public/EWAHaaglanden_logo.jpg"
          class="img-fluid"
          alt="Logo van Ewa Haaglanden"
        >
      </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon" />
      </button>
      <div
        id="navbarNav"
        class="collapse navbar-collapse"
      >
        <ul class="navbar-nav ml-auto">
          <router-link
            class="nav-item"
            tag="li"
            to="/home"
            active-class="active"
          >
            <a class="nav-link">Informatie</a>
          </router-link>
          <router-link
            class="nav-item"
            tag="li"
            to="/home"
            active-class="active"
          >
            <a class="nav-link">Ambassadeurs</a>
          </router-link>
          <router-link
            class="nav-item"
            tag="li"
            to="/home"
            active-class="active"
          >
            <a class="nav-link">Participanten</a>
          </router-link>
          <router-link
            class="nav-item"
            tag="li"
            to="/home"
            active-class="active"
          >
            <a class="nav-link">Nieuws</a>
          </router-link>
          <router-link
            class="nav-item"
            tag="li"
            to="/home"
            active-class="active"
          >
            <a class="nav-link">Magazine</a>
          </router-link>
          <router-link
            class="nav-item"
            tag="li"
            to="/home"
            active-class="active"
          >
            <a class="nav-link">Contact</a>
          </router-link>
        </ul>
      </div>
    </nav>

    <router-view />
  </div>
</template>

<script>

  
export default {
  name: "Navigation",
}
</script>