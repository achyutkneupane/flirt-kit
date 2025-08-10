import Navbar from "@/Components/Shared/Navbar";
import { cn } from "@/Lib/Utils";
import { LayoutProps } from "@/Types/Types";
import ThemeWrapper from "@/Wrappers/ThemeWrapper";
import { Head } from "@inertiajs/react";
import { FC } from "react";
import { Bounce, ToastContainer } from "react-toastify";

const FrontWrapper: FC<LayoutProps> = (props) => {
    const { children, title } = props;

    return (
        <ThemeWrapper>
            <Head title={title} />
            <ToastContainer
                position="bottom-center"
                autoClose={2000}
                hideProgressBar={false}
                newestOnTop={false}
                closeOnClick
                rtl={false}
                pauseOnFocusLoss={false}
                draggable={false}
                pauseOnHover
                theme="dark"
                transition={Bounce}
            />
            <Navbar />
            <div
                className={cn(
                    "w-screen",
                    "[background-size:60px_60px]",
                    "[background-image:linear-gradient(to_right,#f1f1f1_1px,transparent_1px),linear-gradient(to_bottom,#f1f1f1_1px,transparent_1px)]",
                    "dark:[background-image:linear-gradient(to_right,#181818_1px,transparent_1px),linear-gradient(to_bottom,#181818_1px,transparent_1px)]",
                )}
            >
                <div className="mx-auto max-w-7xl">{children}</div>
            </div>
        </ThemeWrapper>
    );
};

export default FrontWrapper;
