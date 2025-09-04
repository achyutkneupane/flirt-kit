import { cn } from "@/Lib/Utils";
import { type TextAreaProps } from "@/Types/Inputs";

const TextArea = (props: TextAreaProps) => {
    const { className, label, errorMessage, id, helperText, wrapperClassName, ...rest } = props;
    return (
        <div className={cn("flex flex-col gap-1", "w-full", wrapperClassName)}>
            <div className="flex flex-row gap-2">
                <label className={cn("text-neutral-800 dark:text-neutral-400", errorMessage && "text-red-500", className)} htmlFor={id}>
                    {label}
                </label>
            </div>
            <div className="flex flex-row items-center justify-start gap-2">
                <div className="relative w-full">
                    <textarea
                        ref={rest.ref}
                        className={cn(
                            "flex w-full",
                            "px-3 py-2",
                            "border border-neutral-600",
                            "bg-neutral-300/20 dark:bg-neutral-700/20",
                            "text-neutral-800 dark:text-neutral-100",
                            "file:text-neutral-300 placeholder:text-neutral-500",
                            "shadow-sm transition-colors",
                            "file:border-0 file:bg-transparent file:text-sm file:font-medium",
                            "focus-visible:ring-1 focus-visible:outline-none",
                            "disabled:cursor-not-allowed disabled:opacity-70",
                            "text-base md:text-sm",
                            className,
                        )}
                        id={id}
                        {...rest}
                    ></textarea>
                </div>
            </div>
            <p className={cn("text-sm", "text-neutral-800 dark:text-neutral-400", errorMessage && "hidden")}>{helperText}</p>
            <p id={`error-${id}`} className={cn("text-red-500", className)}>
                {errorMessage}
            </p>
        </div>
    );
};
TextArea.displayName = "TextArea";

export default TextArea;
