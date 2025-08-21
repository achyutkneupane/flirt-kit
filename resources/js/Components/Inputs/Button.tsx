"use client";

import { cn } from "@/Lib/Utils";
import { ButtonProps } from "@/Types/Inputs";
import { motion, useAnimate } from "motion/react";
import React, { useEffect } from "react";

const Button = (props: ButtonProps) => {
    const { className, children, isSuccess, loading, isError, onClick, ...buttonProps } = props;

    const [scope, animate] = useAnimate();

    const animateLoading = async () => {
        await animate(
            ".loader",
            {
                width: "20px",
                scale: 1,
                display: "block",
            },
            {
                duration: 0.2,
            },
        );
    };

    const animateSuccess = async () => {
        await animate(
            ".loader",
            {
                width: "0px",
                scale: 0,
                display: "none",
            },
            {
                duration: 0.2,
            },
        );
        await animate(
            ".check",
            {
                width: "20px",
                scale: 1,
                display: "block",
            },
            {
                duration: 0.2,
            },
        );

        await animate(
            ".check",
            {
                width: "0px",
                scale: 0,
                display: "none",
            },
            {
                delay: 2,
                duration: 0.2,
            },
        );
    };

    const animateError = async () => {
        await animate(
            ".loader",
            {
                width: "0px",
                scale: 0,
                display: "none",
            },
            {
                duration: 0.2,
            },
        );
        await animate(
            ".cross",
            {
                width: "20px",
                scale: 1,
                display: "block",
            },
            {
                duration: 0.2,
            },
        );

        await animate(
            ".cross",
            {
                width: "0px",
                scale: 0,
                display: "none",
            },
            {
                delay: 2,
                duration: 0.2,
            },
        );
    };

    const handleClick = async (event: React.MouseEvent<HTMLButtonElement>) => {
        await animateLoading();
        onClick?.(event);
    };

    useEffect(() => {
        if (isSuccess) {
            animateSuccess().then();
        } else if (isError) {
            animateError().then();
        }
    }, [isSuccess, isError, loading]);

    function getButtonColor(isError: boolean, isSuccess: boolean): string {
        if (isError) {
            return "bg-red-600 hover:ring-red-500";
        }

        if (isSuccess) {
            return "bg-green-600 hover:ring-green-500";
        }

        return "bg-neutral-600 hover:ring-neutral-500";
    }

    const buttonColor = getButtonColor(isError, isSuccess);

    return (
        <motion.button
            layout
            layoutId="button"
            ref={scope}
            className={cn(
                "ring-offset-white dark:ring-offset-black",
                "flex min-w-[120px] cursor-pointer items-center justify-center gap-2 rounded-full px-4 py-2 font-medium text-white ring-offset-2 transition duration-200 hover:ring-2",
                buttonColor,
                className,
            )}
            {...buttonProps}
            onClick={handleClick}
        >
            <motion.div layout className="flex items-center gap-2">
                <Loader />
                <CheckIcon />
                <CrossIcon />
                <motion.span layout>{children}</motion.span>
            </motion.div>
        </motion.button>
    );
};

const Loader = () => {
    return (
        <motion.svg
            animate={{
                rotate: [0, 360],
            }}
            initial={{
                scale: 0,
                width: 0,
                display: "none",
            }}
            style={{
                scale: 0.5,
                display: "none",
            }}
            transition={{
                duration: 0.3,
                repeat: Infinity,
                ease: "linear",
            }}
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth="2"
            strokeLinecap="round"
            strokeLinejoin="round"
            className="loader text-white"
        >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 3a9 9 0 1 0 9 9" />
        </motion.svg>
    );
};

const CheckIcon = () => {
    return (
        <motion.svg
            initial={{
                scale: 0,
                width: 0,
                display: "none",
            }}
            style={{
                scale: 0.5,
                display: "none",
            }}
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth="2"
            strokeLinecap="round"
            strokeLinejoin="round"
            className="check text-white"
        >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            <path d="M9 12l2 2l4 -4" />
        </motion.svg>
    );
};

const CrossIcon = () => {
    return (
        <motion.svg
            initial={{
                scale: 0,
                width: 0,
                display: "none",
            }}
            style={{
                scale: 0.5,
                display: "none",
            }}
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth="2"
            strokeLinecap="round"
            strokeLinejoin="round"
            className="cross text-white"
        >
            <path strokeLinecap="round" strokeLinejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </motion.svg>
    );
};

export default Button;
