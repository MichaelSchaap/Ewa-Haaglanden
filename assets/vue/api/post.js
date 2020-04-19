import axios from "axios";

export default {
  create(title, content, img) {
    return axios.post("/api/posts/dashboard/create", {
      title: title,
      content: content,
      img: img,
    }
    );
  },
  edit(postId, title, content, img) {
    return axios.patch("/api/posts/dashboard/edit/" + postId, {
      title: title,
      content: content,
      img: img,
    }
    );
  },
  findAll() {
    return axios.get("/api/posts");
  },
  delete(postId) {
    return axios.delete('/api/posts/dashboard/delete/' + postId);
  }
};