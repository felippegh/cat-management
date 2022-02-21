import getData from "./utils/getData";
import BaseConfigs from "./BaseConfigs";

export default class BaseMethods extends BaseConfigs {
    route;

    async index(params) {
        return this.api.get(this.route, { params }).then(getData);
    }

    async store(data) {
        return this.api.post(this.route, data).then(getData);
    }

    async show(id, params) {
        const url = this.route + "/" + id;

        return this.api.get(url, { params }).then(getData);
    }

    async update(id, data) {
        const url = this.route + "/" + id;

        return this.api.put(url, data).then(getData);
    }

    async destroy(id) {
        const url = this.route + "/" + id;

        return this.api.delete(url).then(getData);
    }
}
