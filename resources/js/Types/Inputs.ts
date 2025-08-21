import { ComponentProps } from "react";

export interface InputFieldProps extends ComponentProps<"input"> {
    label?: string;
    errorMessage?: string;
    name: string;
    helperText?: string;
}
