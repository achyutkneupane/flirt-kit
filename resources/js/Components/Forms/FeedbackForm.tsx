import Button from "@/Components/Inputs/Button";
import Input from "@/Components/Inputs/Input";
import { Form } from "@inertiajs/react";

const FeedbackForm = () => {
    const feedbackEndpoint = "https://flirt-kit.laravelnepal.com/feedback";
    return (
        <Form className="mt-6 flex w-full max-w-xl flex-col gap-2" action={feedbackEndpoint} method="POST" disableWhileProcessing resetOnSuccess>
            {({ errors, hasErrors, processing, wasSuccessful }) => (
                <>
                    <Input
                        type="text"
                        name="message"
                        label="Show some love "
                        errorMessage={errors.message}
                        defaultValue="Hey! I installed FLIRT Kit."
                        autoFocus
                        helperText="Feedbacks are appreciated."
                    />
                    <Button loading={processing} isSuccess={wasSuccessful} isError={hasErrors} className="w-full">
                        Submit
                    </Button>
                </>
            )}
        </Form>
    );
};

export default FeedbackForm;
