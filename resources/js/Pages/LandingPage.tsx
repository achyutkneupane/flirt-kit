"use client";

import { cn } from "@/Lib/Utils";
import FrontWrapper from "@/Wrappers/FrontWrapper";
import { ReactNode } from "react";

const LandingPage = () => {
    const appName = import.meta.env.VITE_APP_NAME || "Filament & Inertia Kit";

    return (
        <div
            className={cn(
                "h-full min-h-screen lg:h-screen",
                "w-full",
                "flex flex-col-reverse lg:flex-row",
                "items-center justify-center",
                "gap-24",
                "px-8 py-48 lg:px-0 lg:py-0",
                "text-neutral-700 dark:text-neutral-400",
                "text-4xl lg:text-7xl",
                "font-bold",
            )}
        >
            {appName}
        </div>
    );
};

LandingPage.layout = (page: ReactNode) => <FrontWrapper title={undefined}>{page}</FrontWrapper>;

export default LandingPage;
