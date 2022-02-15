import axios from "axios";
import axiosRetry from "axios-retry";
import handleErrors from "./utils/handleErrors";

export default class BaseConfigs {
    api;
    
    constructor() {
        this.createAxiosInstance();
        this.setDefaultHeaders();
        this.setInterceptors();
        this.setRetries(3);
    }

    createAxiosInstance() {
        this.api = axios.create({
            timeout: 100000,
        });
    }

    setDefaultHeaders() {
        this.api.defaults.headers = {
            "Content-Type": "application/json",
            Accept: "application/json",
            "Access-Control-Allow-Origin": "*",
        };
    }

    setInterceptors() {
        this.api.interceptors.response.use(undefined, (error) => handleErrors(error));
    }

    setRetries(times) {
        axiosRetry(this.api, { retries: times });
    }
}
