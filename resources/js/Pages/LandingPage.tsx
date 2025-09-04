import FeedbackForm from "@/Components/Forms/FeedbackForm";
import { cn } from "@/Lib/Utils";
import { SharedData } from "@/Types/Types";
import FrontWrapper from "@/Wrappers/FrontWrapper";
import { usePage } from "@inertiajs/react";
import { ReactNode } from "react";

const LandingPage = () => {
    const { siteSettings } = usePage<SharedData>().props;
    const appName = import.meta.env.VITE_APP_NAME || "FLIRT Kit";

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
            <h1 className={cn("text-neutral-700 dark:text-neutral-400", "text-4xl lg:text-7xl", "font-bold", "text-center")}>
                {siteSettings.name ?? appName}
            </h1>
            <p className={cn("text-neutral-500 dark:text-neutral-400", "text-lg lg:text-xl", "text-center")}>{siteSettings.description}</p>
            <FeedbackForm />
        </div>
    );
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
