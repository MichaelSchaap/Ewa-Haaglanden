import axios from "axios";

export default {
  create(name, email, message, subscribed) {
    return axios.post("/api/home", {
      name: name,
      email: email,
      message: message,
      subscribed: subscribed
    }
    );
  },
  findAll() {
    return axios.get("/api/admin/dashboard");
  },
};