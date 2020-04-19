<template>
  <div>
    <div class="page-header clear-filter">
      <div>
        <img
          class="img-responsive"
          style="width:90%; position: absolute; left: 5%; bottom:25%"
          src="images/EWAHaaglanden_logo.jpg"
          alt="Ewa Haaglanden logo"
        />
      </div>
    </div>

    <div class="container text-center" style="margin-bottom:5%">
      <div class="row justify-content-md-center">
        <div class="col-md-12 col-lg-8">
          <h2 class="title" style="color: black; font-size:40px;">Introductie Ewa Haaglanden</h2>
          <h5
            class="description"
            style="color:black;"
          >Ewa Haaglanden is een samenwerkingsverband tussen bedrijven, gemeente, ROC Mondriaan en andere partijen in de regio Haaglanden. Binnen Ewa Haaglanden willen we samen jonge mensen zonder diploma begeleiden, opleiden en doorschakelen naar een diploma én een fijne werkplek. We willen kandidaten binnen bedrijven verder opleiden. En we willen kandidaten met relevante scholing dichter bij een baan en participatie brengen.</h5>
        </div>
      </div>
    </div>

    <VideoSection></VideoSection>
    <NewsSection></NewsSection>
    <ContactUsSection></ContactUsSection>
    <!-- <HomeContactSection></HomeContactSection> -->
    <PartnerSection></PartnerSection>
  </div>
</template>
<script>
import VideoSection from "../pages/components/VideoSection";
import PartnerSection from "../pages/components/PartnerSection";
import NewsSection from "../pages/components/NewsSection";
import ContactUsSection from "../pages/components/ContactUsSection";

export default {
  name: "index",
  bodyClass: "index-page",
  components: {
    VideoSection,
    NewsSection,
    PartnerSection,
    ContactUsSection
  }
};
</script>
<style></style>
