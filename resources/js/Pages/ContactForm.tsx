import Button from "@/Components/Inputs/Button";
import Input from "@/Components/Inputs/Input";
import TextArea from "@/Components/Inputs/TextArea";
import { cn } from "@/Lib/Utils";
import FrontWrapper from "@/Wrappers/FrontWrapper";
import { Form } from "@inertiajs/react";
import { ReactNode } from "react";
import { toast } from "react-toastify";
import { route } from "ziggy-js";

const ContactForm = () => {
    return (
        <div
            className={cn(
                "h-full min-h-screen lg:h-screen",
                "w-full",
                "flex flex-col",
                "items-center justify-center",
                "gap-4",
                "px-8 py-48 lg:px-0 lg:py-0",
            )}
        >
            <h1 className={cn("text-neutral-700 dark:text-neutral-400", "text-4xl lg:text-7xl", "font-bold", "text-center")}>Contact Us</h1>
            <Form
                action={route("contact.submit")}
                method="post"
                className="grid w-full grid-cols-1 gap-4 lg:grid-cols-2"
                onSuccess={() => {
                    toast.success("Contact form submitted successfully!");
                }}
                onError={() => {
                    toast.error("There was an error submitting the contact form.");
                }}
                resetOnSuccess
            >
                {({ errors, hasErrors, processing, wasSuccessful }) => (
                    <>
                        <Input
                            type="text"
                            name="name"
                            label="Your Name"
                            placeholder="John Doe"
                            autoFocus
                            wrapperClassName="col-span-1 lg:col-span-2"
                            errorMessage={errors.name}
                        />
                        <Input type="email" name="email" label="Your Email" placeholder="test@website.com" errorMessage={errors.email} />
                        <Input type="text" name="phone" label="Phone Number" placeholder="+1234567890" errorMessage={errors.phone} />
                        <TextArea
                            name="message"
                            label="Your Message"
                            placeholder="Type your message here..."
                            wrapperClassName="col-span-1 lg:col-span-2"
                            errorMessage={errors.message}
                            rows={4}
                        />
                        <Button
                            className="col-span-1 w-full lg:col-span-2"
                            type="submit"
                            loading={processing}
                            disabled={processing}
                            isSuccess={wasSuccessful}
                            isError={hasErrors}
                        >
                            Submit
                        </Button>
                    </>
                )}
            </Form>
        </div>
    );
};

ContactForm.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default ContactForm;
