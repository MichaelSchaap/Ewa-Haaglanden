<template>
    <section class="team text-center" style="margin-bottom:25px;background-color: #CC0029">
      <div class="container">
        <h2 class="title" style="font-size:50px; color:white; margin-bottom:100px;">ONS TEAM.</h2>
        <div class="team">
          <div class="row">
            <div class="col-md-4">
              <div class="team-player" style="margin-bottom:15px">
                <img
                  src="images/person2.jpg"
                  alt="Foto van ..."
                  class="rounded-circle img-fluid img-raised"
                />
                <h4 class="title" style="color:white;">Andrew Ryan</h4>
                <p class="category text-primary">Directeur scholen voor Zorg & Welzijn</p>
                <p class="description" style="color:white;">
                  You can write here details about one of your team members. You
                  can give more details about what they do. Feel free to add
                  some <a href="#">links</a> for people to be able to follow
                  them outside the site.
                </p>
                <a href="#" class="btn btn-primary btn-icon btn-round"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"
                  ><i class="fab fa-instagram"></i
                ></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"
                  ><i class="fab fa-facebook-square"></i
                ></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player" style="margin-bottom:15px">
                <img
                  src="images/person1.jfif"
                  alt="Foto van ..."
                  class="rounded-circle img-fluid img-raised"
                />
                <h4 class="title" style="color:white;">Ryan Tompson</h4>
                <p class="category text-primary">Programma Manager</p>
                <p class="description" style="color:white;">
                  You can write here details about one of your team members. You
                  can give more details about what they do. Feel free to add
                  some <a href="#">links</a> for people to be able to follow
                  them outside the site.
                </p>
                <a href="#" class="btn btn-primary btn-icon btn-round"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"
                  ><i class="fab fa-linkedin"></i
                ></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player" style="margin-bottom:15px">
                <img
                  src="images/person3.jpg"
                  alt="Foto van ..."
                  class="rounded-circle img-fluid img-raised"
                />
                <h4 class="title" style="color:white;">Eva Jenner</h4>
                <p class="category text-primary">Team Manager</p>
                <p class="description" style="color:white;">
                  You can write here details about one of your team members. You
                  can give more details about what they do. Feel free to add
                  some <a href="#">links</a> for people to be able to follow
                  them outside the site.
                </p>
                <a href="#" class="btn btn-primary btn-icon btn-round"
                  ><i class="fab fa-google-plus"></i
                ></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"
                  ><i class="fab fa-youtube"></i
                ></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"
                  ><i class="fab fa-twitter"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
   </section>
</template>

<script>

export default {
  name: 'TeamSection',
}
</script>

<style lang="scss" scoped>
@import "../../assets/scss/now-ui-kit/mixins.scss";


section{
@include angled-edge('outside bottom', 'lower right', #CC0029);
}
</style>
