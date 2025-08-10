import { LayoutProps } from "@/Types/Types";
import { Head } from "@inertiajs/react";
import { FC } from "react";
import { Bounce, ToastContainer } from "react-toastify";

const FrontWrapper: FC<LayoutProps> = (props) => {
    const { children, title } = props;

    return (
        <>
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
            <div
                className="bg-bg"
            >
                {children}
            </div>
        </>
    );
};

export default FrontWrapper;
