export default function handleErrors(error) {
    const err = JSON.parse(error.request.response);
    let messageError = [];

    if (error.response.status === 500) {
        messageError = ["There was an error, try again!"];
    }

    if (error.response.status === 422) {
        messageError = Object.values(err.errors || {})
            .map((x) => {
                return Array.isArray(x) ? x[0] : x;
            })
            .filter((x, i, arr) => arr.indexOf(x) === i);
    }

    return Promise.reject(messageError);
}
