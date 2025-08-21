import { cn } from "@/Lib/Utils";
import { type InputFieldProps } from "@/Types/Inputs";

const Input = (props: InputFieldProps) => {
    const { className, type, label, errorMessage, id, helperText, ...rest } = props;
    return (
        <div className="flex w-full flex-col gap-1">
            <div className="flex flex-row gap-2">
                <label
                    className={cn("text-neutral-800 dark:text-neutral-400", errorMessage && "text-laravel-red dark:text-laravel-red", className)}
                    htmlFor={id}
                >
                    {label}
                </label>
            </div>
            <div className="flex flex-row items-center justify-start gap-2">
                <div className="relative w-full">
                    <input
                        ref={rest.ref}
                        type={type}
                        className={cn(
                            "flex w-full",
                            "px-3 py-2",
                            "rounded-md",
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
                    />
                </div>
            </div>
            <p className={cn("text-sm", "text-neutral-800 dark:text-neutral-400", errorMessage && "hidden")}>{helperText}</p>
            <p id={`error-${id}`} className={cn("text-laravel-red", className)}>
                {errorMessage}
            </p>
        </div>
    );
};
Input.displayName = "Input";

export default Input;
