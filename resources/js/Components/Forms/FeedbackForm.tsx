import Button from "@/Components/Inputs/Button";
import Input from "@/Components/Inputs/Input";
import { useForm } from "@inertiajs/react";
import { FormEvent, useState } from "react";
import { toast } from "react-toastify";

type ResponseStatus = "not-initiated" | "loading" | "success" | "error";

const FeedbackForm = () => {
    const feedbackEndpoint = "https://flirt-kit.laravelnepal.com/feedback";
    const { errors, data, setData, setError } = useForm({
        message: "Hey! I installed FLIRT Kit.",
    });

    // Forms in inertia are not supposed to do this way.
    // I've done this way to call external API.
    // Ideally, you should use inertia's form handler
    // Docs: https://inertiajs.com/forms
    const [status, setStatus] = useState<ResponseStatus>("not-initiated");

    const handleSubmit = async (event: FormEvent) => {
        event.preventDefault();
        await fetch(feedbackEndpoint, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(() => {
                toast.success("Thank you for your feedback!");
                setData("message", "Hey! I installed FLIRT Kit.");
                setStatus("success");
                setTimeout(() => {
                    setStatus("not-initiated");
                }, 2500);
                setError("message", "");
            })
            .catch((error) => {
                setStatus("error");
                setError("message", error.message);
            });
    };

    return (
        <form className="mt-6 flex w-full max-w-xl flex-col gap-2" onSubmit={handleSubmit}>
            <Input
                type="text"
                name="message"
                label="Show some love "
                value={data.message}
                onChange={(e) => setData("message", e.target.value)}
                errorMessage={errors.message}
                autoFocus
                helperText="Feedbacks are appreciated."
            />
            <Button
                loading={status === "loading"}
                className="w-full"
                isSuccess={status === "success"}
                isError={status === "error"}
                type="submit"
                onClick={() => setStatus("loading")}
            >
                Submit
            </Button>
        </form>
    );
};

export default FeedbackForm;
