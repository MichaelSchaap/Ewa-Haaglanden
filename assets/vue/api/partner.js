import axios from "axios";

export default {
  create(name, website, img) {
    return axios.post("/api/admin/dashboard/partner/create", {
      name: name,
      website: website,
      img: img
    }
    );
  },
  findAll() {
    return axios.get("/api/partners");
  },
};