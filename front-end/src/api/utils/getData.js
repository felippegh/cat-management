import { get } from "lodash";

export default function getData(response) {
  return get(response, "data", null);
}
