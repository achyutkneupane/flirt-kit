import { FloatingDock } from "@/Components/ShadCN/FloatingDock";
import { filterAndReturnSocialMediaLinks } from "@/Lib/Utils";
import { SharedData } from "@/Types/Types";
import { usePage } from "@inertiajs/react";

const FloatingSocialMedia = () => {
    const { socialMediaSettings } = usePage<SharedData>().props;
    const dockItems = filterAndReturnSocialMediaLinks(socialMediaSettings);

    if (dockItems.length === 0) {
        return null;
    }

    return (
        <div className="fixed bottom-5 z-50 mx-auto flex w-full max-w-screen-lg items-center justify-end-safe px-4 py-2 lg:inset-x-0 lg:justify-center-safe">
            <FloatingDock items={dockItems} />
        </div>
    );
};

export default FloatingSocialMedia;
