import { filterAndReturnSocialMediaLinks } from "@/Lib/Utils";
import { SharedData } from "@/Types/Types";
import { usePage } from "@inertiajs/react";
import {FloatingDock} from "@/Components/ShadCN/FloatingDock";

const FloatingSocialMedia = () => {
    const { socialMediaSettings } = usePage<SharedData>().props;

    const links = filterAndReturnSocialMediaLinks(socialMediaSettings);

    return (
        <div className="fixed inset-x-0 bottom-5 z-50 mx-auto flex w-full max-w-screen-lg items-center justify-center px-4 py-2">
            <FloatingDock
                mobileClassName="translate-y-20"
                items={links}
            />
        </div>
    );
};

export default FloatingSocialMedia;
