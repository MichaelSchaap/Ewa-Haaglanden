import axios from "axios";

export default {
  create(name, email, subject, message, subscribed) {
    return axios.post("/api/home", {
      name: name,
      email: email,
      subject: subject,
      message: message,
      subscribed: subscribed
    }
    );
  },
  findAll() {
    return axios.get("/api/admin/dashboard");
  },
};