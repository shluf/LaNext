import axios from "axios";
import useSWR from "swr";

export const useUser = () => {
    const url = process.env.NEXT_PUBLIC_BACKEND_URL
    
    const { data, error } = useSWR('/users', () =>
        axios
            .get(`${url}/users`)
            .then(res => res.data)
            .catch(error => {
                console.log("error")
                if (error.response.status !== 409) throw error
            }),
    )

    return {
        users: data,
        isLoading: !error && !data,
        isError: error,
    }
}